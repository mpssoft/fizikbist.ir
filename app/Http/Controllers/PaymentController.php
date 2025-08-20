<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Services\SpotPlayerService;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\Shop\Models\CartItem;



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
                $alreadyBought[] = $cartItem['item_name'] ?? $cartItem->item->title;
            }
        }

        if (!empty($alreadyBought)) {
            alert('پرداخت تکراری', ' شما قبلا این دوره(ها) را خریداری کرده‌اید: ' . implode(', ', $alreadyBought), 'success');
            return redirect()->route('shop.cart.index');
        }

        // Calculate total price
        //$totalPrice = $cart->sum(fn($item) => $item['price'] ?? 0);
        // Calculate total price with discounts
        // Calculate total price with discounts
        $totalPrice = $cart->sum(function ($item) {
            $i = json_decode($item->discount,true);
            $price = $item['price'] ?? 0;
            if (!is_null($item->discount)) {
                if ($i['type'] === 'percent') {
                    $price -= $price * ($i['value'] / 100);
                } else  {
                    $price -= $i['value'];
                }
            }

            return max($price, 0); // never below zero
        });

// Create the Order
        $order = Order::create([
            'user_id' => $user->id,
            'status'  => 'pending',
            'price'   => $totalPrice,
        ]);

// Create the Order
        $order = Order::create([
            'user_id' => $user->id,
            'status'  => 'pending',
            'price'   => $totalPrice,
        ]);

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
            alert('', $response->error()->message(), 'error');
            return redirect('/cart');

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
        //$this->paymentSuccess(request('order_id'), new SpotPlayerService());
        $this->paymentSuccess($payment->order, new SpotPlayerService());

        //alert('', 'پرداخت موفق', 'toast');
        // clear cart items

        CartItem::where('user_id', auth()->id())->delete();
        Cookie::queue(Cookie::forget('shop_cart'));

        return redirect(route('user.courses'));
}

// STEP 2: Simulate payment success
    public function paymentSuccess(Order $order, SpotPlayerService $spotPlayer)
    {
        DB::beginTransaction();

        try {
            $order->load('items.item'); // eager load order items + related models
            $user = auth()->user();
            Log::info("Reached paymentSuccess for order {$order->id}");

            foreach ($order->items as $item) {
                $model = $item->item; // e.g., Course, Product, etc.
                Log::info("model  is: ". $model->title);
                // Attach course to user
                if ($model instanceof \App\Models\Course) {
                    $user->courses()->syncWithoutDetaching([$model->id]);
                    Log::info("Attached course {$model->id} to user {$user->id}");
                }

                // Generate SpotPlayer license if available
                if (!empty($model->spotplayer_id)) {
                    $licenses[] = $this->generateLicense($user, $order, $model, $spotPlayer);

                }
            }

            DB::commit();

            return redirect()->route('admin.courses.index')
                ->with(['success'=>'Payment successful. Your items are unlocked!','licenses'=>$licenses]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Payment error', [
                'order_id' => $order->id,
                'message'  => $e->getMessage(),
            ]);
            return back()->with('error', 'Payment processed but license generation failed.');
        }
    }



    protected function generateLicense($user, Order $order, $model, SpotPlayerService $spotPlayer)
    {
        Log::info("Generating SpotPlayer license for user {$user->id}, item {$model->id}");

        $spotplayerCourseId = $model->spotplayer_id;

        $licenseResponse = $spotPlayer->createLicenseForUser($user, $order, $spotplayerCourseId,$model);

        if (!$licenseResponse || empty($licenseResponse['spotplayer_key'])) {
            Log::error("Failed to generate SpotPlayer license for item {$model->id}");
            return false;
        }

       // Log::info("SpotPlayer license generated successfully". $licenseResponse);

        return ['license' => $licenseResponse->spotplayer_key,
            'course'=>$licenseResponse->course->title,
            'teacher'=>$licenseResponse->course->teacher->name
            ];
    }

}
