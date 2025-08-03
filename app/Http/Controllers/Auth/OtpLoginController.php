<?php

namespace App\Http\Controllers\Auth;

use App\Notifications\Channels\MelipayamakChannel;
use App\Notifications\SendOtpSms;
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


        // اگر بلاک شده باشه (بعد از 3 بار ارسال)
        if (Cache::has($blockKey)) {
            return response()->json([
                'status' => 'error',
                'message' => 'شما بیش از حد مجاز درخواست داده‌اید. لطفاً یک ساعت دیگر تلاش کنید.'
            ], 429);
        }

        // گرفتن تعداد تلاش‌ها از کش
        $attempts = Cache::get($attemptKey, 0);

        if ($attempts >= 3) {
            // بلاک کردن برای یک ساعت
            Cache::put($blockKey, true, now()->addHour());
            Cache::forget($attemptKey);

            return response()->json([
                'status' => 'error',
                'message' => 'به دلیل درخواست‌های مکرر، ارسال کد برای شما به مدت 1 ساعت غیرفعال شده است.'
            ], 429);
        }

        // افزایش تعداد تلاش‌ها و ذخیره با انقضا 1 ساعت (از اولین تلاش)
        if ($attempts == 0) {
            Cache::put($attemptKey, 1, now()->addHour());
        } else {
            Cache::increment($attemptKey);
        }

        // تولید کد OTP
        $otp = rand(1000, 9999);
        Cache::put('otp_' . $mobile, $otp, now()->addMinutes(3));

        // ارسال پیامک
        $channel = new MelipayamakChannel();
        $response = $channel->send(null, new SendOtpSms($otp, $mobile));

        if ($response['StrRetStatus'] == "Ok") {
            return response()->json([
                'status' => 'ok',
                'code' => $response['RetStatus'],
            ]);
        } else {
            return response()->json([
                'status' => $response['StrRetStatus'],
                'code' => $response['RetStatus'],
                'message' => 'خطا هنگام ارسال کد'
            ]);
        }
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

            return response()->json(['status' => 'ok', 'role' => $user->role]);

        }

        return response()->json(['status' => 'error', 'message' => 'کد وارد شده اشتباه است']);
    }
}
