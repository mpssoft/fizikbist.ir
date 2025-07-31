<?php

namespace App\Http\Controllers\Auth;

use App\Models\ActiveCode;
use App\Notifications\ActiveCode as ActiveCodeNotification;
use App\Notifications\LoginToWebsite as LoginToWebsiteNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait TwoFactorAuthenticate
{
    public function loggedIn(Request $request,$user)
    {
        if($user->hasTwoFactorAuthenticationEnabled()){
            $this->logoutAndRedirectToTokenEntry($request);
        }
        try {
            $user->notify(new LoginToWebsiteNotification());
        }catch(\Exception $e){
            throw $e;
        }
        return false;
    }

    public function logoutAndRedirectToTokenEntry(Request $request){

        $user = $request->user();
        Auth::logout();
        $request->session()->flash('auth' , [
            'user_id' => $user->id,
            'using_sms' =>false,
            'remember' => $request->remember
        ]);

        if($user->hasSmsTwoFactorAuthenticationEnabled()){

            $request->session()->push('auth.using_sms',true);
            $code = ActiveCode::generateCode($user);

            $user->notify(new ActiveCodeNotification($code,$user->phone_number));


        }
        return redirect(route('twoFactorAuthForm'));
    }
}
