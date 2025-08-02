<?php
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Notification;
use App\Models\User;

class OtpLoginController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|regex:/^09\d{9}$/',
        ]);

        $mobile = $request->mobile;
        $attemptKey = 'otp_attempts_' . $mobile;
        $blockKey = 'otp_blocked_' . $mobile;

        // If mobile is blocked
        if (Cache::has($blockKey)) {
            return response()->json([
                'status' => 'error',
                'message' => 'شما بیش از حد مجاز درخواست داده‌اید. لطفاً یک ساعت دیگر تلاش کنید.'
            ], 429);
        }

        // Increment attempt count
        $attempts = Cache::increment($attemptKey);
        if ($attempts === 1) {
            // set 1-hour expiry from first attempt
            Cache::put($attemptKey, 1, now()->addHour());
        }

        if ($attempts > 3)  {
            // Block for 1 hour
            Cache::put($blockKey, true, now()->addHour());
            Cache::forget($attemptKey); // optional: reset attempts after block

            return response()->json([
                'status' => 'error',
                'message' => 'به دلیل درخواست‌های مکرر، ارسال کد برای شما به مدت 1 ساعت غیرفعال شده است.'
            ], 429);
        }

        // Generate OTP
        $otp = rand(1000, 9999);
        Cache::put('otp_' . $mobile, $otp, 180); // expires in 3 minutes

        Notification::route('sms', $mobile)
            ->notify(new \App\Notifications\SendOtpSms($otp, $mobile));

        return response()->json(['status' => 'ok']);
    }


    public function verifyOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|regex:/^09\d{9}$/',
            'otp' => 'required|digits:4'
        ]);

        $cachedOtp = Cache::get('otp_' . $request->mobile);

        if ($cachedOtp && $cachedOtp == $request->otp) {
            $user = User::firstOrCreate(
                ['mobile' => $request->mobile],
                [
                    'name' => 'کاربر جدید',
                    'email' => $request->mobile . '@otp.local',
                    'password' => bcrypt('defaultpass'), // dummy password
                ]
            );

            Auth::login($user, $request->remember == 1);
            Cache::forget('otp_' . $request->mobile);

            return response()->json(['status' => 'ok']);
        }

        return response()->json(['status' => 'error', 'message' => 'کد وارد شده اشتباه است']);
    }
}
