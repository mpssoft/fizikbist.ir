<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ActiveCode;
use App\Models\User;
use App\Notifications\LoginToWebsite as LoginToWebsiteNotification;
use Illuminate\Http\Request;

class TwoFactorAuthenticateController extends Controller
{
    public function twoFactorAuthForm(Request $request)
    {

        if(! $request->session()->has('auth')){

            return redirect(route('login'));
        }
        $request->session()->reflash();
        return view('auth.two-factor-auth-form');
    }
    public function verifyToken(Request $request)
    {
        $request->validate([
            'token' => 'required'
        ]);

        if(!$request->session()->has('auth')){
            return redirect(route('login'));
        }

        $user = User::FindOrFail($request->session()->get('auth.user_id'));

        $status = ActiveCode::verifyCode($user , $request->token);

        if( ! $status){
            Alert('','ورود به سیستم ناموفق !','error');
            return redirect(route('login'));
        }
        if(auth()->loginUsingId($user->id,$request->session()->get('auth.remember'))) {
            $user->activeCode()->delete();
            $user->notify(new LoginToWebsiteNotification());
            Alert('', 'ورود به سیستم موفق !', 'success');
            return redirect(route('dashboard'));
        }
        return redirect(route('login'));
    }

}
