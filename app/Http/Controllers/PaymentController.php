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
            return redirect()->route('user.courses')->with('info', 'You already bought this course.');
        }

        $order = Order::create([
            'user_id' => $user->id,
            'course_id' => $courseId,
            'status' => 'pending',
        ]);

        Payment::create([
            'order_id' => $order->id,
            'gateway' => 'manual',
            'amount' => 100000, // example: 100,000 Toman
            'status' => 'initiated',
        ]);

        // Redirect to fake/manual payment page or gateway
        return view('payments.fakepay', compact('order'));
    }

    // STEP 2: Simulate payment success
    public function paymentSuccess($orderId, SpotPlayerService $spotPlayer)
    {
        DB::beginTransaction();

        try {
            $order = Order::with('course', 'payment')->findOrFail($orderId);
            $user = auth()->user();

            // Update order/payment
            $order->update(['status' => 'paid']);
            $order->payment->update([
                'status' => 'success',
                'transaction_id' => 'MANUAL-' . now()->timestamp,
            ]);

            // Assign course to user
            $user->courses()->syncWithoutDetaching([$order->course_id]);

            // Call SpotPlayer API
            $licenseResponse = $spotPlayer->createLicense(
                $order->course->spotplayer_id,
                $user->email,
                365
            );

            License::create([
                'user_id' => $user->id,
                'course_id' => $order->course_id,
                'spotplayer_license' => $licenseResponse['license_key'],
            ]);

            DB::commit();

            return redirect()->route('user.courses')->with('success', 'Payment successful. Course unlocked!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Payment error', ['message' => $e->getMessage()]);
            return back()->with('error', 'Payment processed but license generation failed.');
        }
    }
}
