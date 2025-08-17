<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
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
    public function createOrder()
    {
        $user = auth()->user();
        $cart = $user->cartItems()->get(); // fetch user's cart

        if ($cart->isEmpty()) {
            alert('سبد خرید خالی است', 'هیچ آیتمی برای پرداخت وجود ندارد', 'toast');
            return redirect()->route('cart.index');
        }

        // Check for already purchased courses
        $alreadyBought = [];
        foreach ($cart as $cartItem) {
            $itemClass = $cartItem['item_type'];
            $itemId = $cartItem['item_id'];

            $exists = OrderItem::where('item_type', $itemClass)
                ->where('item_id', $itemId)
                ->whereHas('order', function($query) use ($user) {
                    $query->where('user_id', $user->id)
                        ->where('status', 'paid');
                })->exists();

            if ($exists) {
                $alreadyBought[] = $cartItem['item_name'] ?? $itemId;
            }
        }

        if (!empty($alreadyBought)) {
            alert('پرداخت تکراری', 'شما قبلا این دوره(ها) را خریداری کرده‌اید: ' . implode(', ', $alreadyBought), 'success');
            return redirect()->route('cart.index');
        }

        // Calculate total price
        $totalPrice = $cart->sum(fn($item) => $item['price'] ?? 0);

        // Create the Order
        $order = Order::create([
            'user_id' => $user->id,
            'status' => 'pending',
            'price' => $totalPrice
        ]);

        // Create OrderItems
        foreach ($cart as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'item_id' => $cartItem['item_id'],
                'item_type' => $cartItem['item_type'],
                'price' => $cartItem['price'],
                'discount' => $cartItem['discount'] ?? null
            ]);
        }

        // Payment creation & redirect (same as before)
        $payment = Payment::create([
            'order_id' => $order->id,
            'gateway' => 'zarinpal',
            'status' => 'initiated',
        ]);

        $response = zarinpal()
            ->merchantId(config('zarinpal.merchant_id'))
            ->amount($totalPrice)
            ->request()
            ->description('پرداخت سفارش #' . $order->id)
            ->callbackUrl(route('user.payment.zarinpalCallback', [
                'order_id' => $order->id,
                'price' => $totalPrice
            ]))
            ->send();

        if (!$response->success()) {
            alert('', $response->error()->message(), 'toast');
            return redirect()->route('cart.index');
        }

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
    $spotplayerCourseIds = $order->course->spotplayer_id; // Adjust field name

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
