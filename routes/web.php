<?php

use App\Http\Controllers\Auth\OtpLoginController;
use App\Http\Controllers\Auth\TwoFactorAuthenticateController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use Melipayamak\MelipayamakApi ;
Route::get('/', function () {


//   try{
//        $sms = app('melipayamak',config('melipayamak'))->sms();
//        //dd($sms);
//        $to = '09384056563';
//        $from = '50002710099676';
//        $text = '1234';
//        $response = $sms->send($to,$from,$text);
//        $json = json_decode($response);
//        echo $json->Value; //RecId or Error Number
//    }catch(Exception $e){
//        echo $e->getMessage();
//    }
    return view('home.index');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/auth/twoFactorAuth',[TwoFactorAuthenticateController::class,'twoFactorAuthForm'])->name('twoFactorAuthForm');
Route::post('/auth/twoFactorAuth',[TwoFactorAuthenticateController::class,'verifyToken'])->name('auth.verifyToken');



Route::post('/send-otp', [OtpLoginController::class, 'sendOtp'])->name('otp.send');
Route::post('/verify-otp', [OtpLoginController::class, 'verifyOtp'])->name('otp.verify');

require __DIR__.'/auth.php';
