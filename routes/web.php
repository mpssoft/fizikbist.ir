<?php

use App\Http\Controllers\Auth\OtpLoginController;
use App\Http\Controllers\Auth\TwoFactorAuthenticateController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
use Melipayamak\MelipayamakApi ;
Route::get('/', function () {

    //auth()->loginUsingId(1);

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
