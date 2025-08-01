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

        $otp = rand(100000, 999999);
        Cache::put('otp_' . $request->mobile, $otp, 60);

        Notification::route('sms', $request->mobile)
            ->notify(new \App\Notifications\SendOtpSms($otp,$request->mobile));

        return response()->json(['status' => 'ok']);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required|regex:/^09\d{9}$/',
            'otp' => 'required|digits:6'
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
