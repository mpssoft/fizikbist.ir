<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\Recaptcha;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Mockery\Exception;

class GoogleAuthController extends Controller
{
    use TwoFactorAuthenticate;
    public function redirect()
    {


        return Socialite::driver('google')->redirect();
    }

    public function callback(Request $request)
    {

        try{
            $googleUser = Socialite::driver('google')->user();

            $user = User::whereEmail($googleUser->getEmail())->first();

            if(! $user){
                $user =  User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt('password'),
                    'two_factor_type' => 'off'
                ]);
            }
            $user->markEmailAsVerified();
            auth()->loginUsingId($user->id);

            return $this->loggedIn($request,$user)? : redirect(route('dashboard'));

        }catch(\Exception $e){
            Alert('',$e->getMessage(),'error');
            return redirect(route('login'));
        }
    }
}
