<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Models\License;
use App\Models\Course;
use App\Services\SpotPlayerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Pishran\Zarinpal\Zarinpal;


class PaymentController extends Controller
{

    // STEP 1: Create an order (user clicks "buy course")
    public function createOrder($courseId)
    {
        $user = auth()->user();
        $course = Course::findOrFail($courseId);

        // Prevent duplicate orders
        $existing = Order::where('user_id', $user->id)
            ->where('course_id', $courseId)
            ->where('status', 'paid')
            ->first();

        if ($existing) {
            alert("پرداخت تکراری","قبلا پرداخت برای این دوره انجام شده است ","success");
            return redirect()->route('user.courses')->with('info', 'You already bought this course.');
        }

        $order = Order::create([
            'user_id' => $user->id,
            'course_id' => $courseId,
            'status' => 'pending',
            'price' => $course->price
        ]);

        Payment::create([
            'order_id' => $order->id,
            'gateway' => 'zarinpal',
            'status' => 'initiated',
        ]);
        // Redirect to fake/manual payment page or gateway
        $response = zarinpal()
            ->merchantId(config('zarinpal.merchant_id')) // تعیین مرچنت کد در حین اجرا - اختیاری
            ->amount($course->price) // مبلغ تراکنش
            ->request()
            ->description($course->title) // توضیحات تراکنش
            ->callbackUrl('http://localhost:8000/user/payment/zarinpalCallback/?order_id=' . $order->id . '&price=' . $order->price) // آدرس برگشت پس از پرداخت
            // ->mobile($user->mobile) // شماره موبایل مشتری - اختیاری
            //  ->email($user->email) // ایمیل مشتری - اختیاری
            ->send();
        //dd($response);
        if (!$response->success()) {
            alert('', $response->error()->message(), 'toast');
            return redirect('/');
        }

// ذخیره اطلاعات در دیتابیس
// $response->authority();

// هدایت مشتری به درگاه پرداخت
        return $response->redirect();
    }

    public function zarinpalCallback()
    {
        $authority = request()->query('Authority'); // دریافت کوئری استرینگ ارسال شده توسط زرین پال
        $status = request()->query('Status'); // دریافت کوئری استرینگ ارسال شده توسط زرین پال

        $response = zarinpal()
            ->merchantId(config('zarinpal.merchant_id')) // تعیین مرچنت کد در حین اجرا - اختیاری
            ->amount(request('price'))
            ->verification()
            ->authority($authority)
            ->send();

        if (!$response->success()) {
            alert('', $response->error()->message(), 'toast');
            return redirect('/');

        }

// دریافت هش شماره کارتی که مشتری برای پرداخت استفاده کرده است
// $response->cardHash();

// دریافت شماره کارتی که مشتری برای پرداخت استفاده کرده است (بصورت ماسک شده)
// $response->cardPan();

// پرداخت موفقیت آمیز بود
// دریافت شماره پیگیری تراکنش و انجام امور مربوط به دیتابیس
        $payment = Payment::with('order')->where('order_id',request('order_id'))->firstOrFail();
        $payment->update([
            'status' => "success",
            'resnumber' =>  $response->referenceId(),
            'transaction_id' => 'MANUAL-' . now()->timestamp,
        ]);


        $payment->order->update([
            'status' => 'paid',
        ]);

        // payment success so request license fro spotplayer
        $this->paymentSuccess(request('order_id'), new SpotPlayerService());

        alert('', 'پرداخت موفق', 'toast');

        return redirect(route('user.courses'));
}

// STEP 2: Simulate payment success
public function paymentSuccess($orderId, SpotPlayerService $spotPlayer)
{
    DB::beginTransaction();

    try {
        $order = Order::findOrFail($orderId);
        $user = auth()->user();
        Log::info("reached paymentSuccess");

        // Assign course to user
        $user->courses()->syncWithoutDetaching([$order->course_id]);
        Log::info("passed syncWithoutDetaching");

        // Call SpotPlayer API
        $this->generateLicense(request(), $spotPlayer);

        DB::commit();

        return redirect()->route('user.courses')->with('success', 'Payment successful. Course unlocked!');
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Payment error', ['message' => $e->getMessage()]);
        return back()->with('error', 'Payment processed but license generation failed.');
    }

}


public
function generateLicense(Request $request, SpotPlayerService $spotPlayer)
{
    Log::info("first line of generateLicense");
    $orderId = $request->input('order_id');
    Log::info("Order id is : $orderId");

    $order = Order::with('user','course')->findOrFail($orderId);
    Log::info("reached generateLicense");
    // Get user info
    $user = $order->user;

    // These are SpotPlayer course IDs (you must store or map them yourself)
    $spotplayerCourseIds = $order->course->spotplayer_course_id; // Adjust field name

    // Generate license
    $licenseResponse = $spotPlayer->createLicenseForUser($user, $order, $spotplayerCourseIds);

    if (!$licenseResponse || empty($licenseResponse['spotplayer_key'])) {
        return response()->json(['error' => 'Failed to generate license from SpotPlayer'], 500);
    }


    return response()->json([
        'message' => 'License generated and saved successfully.',
        'status' => 'ok',
    ]);
}
}
