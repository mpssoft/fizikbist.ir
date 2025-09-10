<?php


use App\Http\Controllers\Admin\panel\SliderController;
use App\Http\Controllers\Auth\OtpLoginController;
use App\Http\Controllers\Auth\TwoFactorAuthenticateController;

use App\Http\Controllers\Frontend\ContactMessageController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Modules\Shop\Http\Controllers\CartController;

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/r',function(){
    Artisan::call('route:list');
    echo "<pre>";
    echo Artisan::output();
});

Route::get('/spot/{order}/{spot}',[\App\Http\Controllers\PaymentController::class,'paymentSuccess']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/auth/twoFactorAuth',[TwoFactorAuthenticateController::class,'twoFactorAuthForm'])->name('twoFactorAuthForm');
Route::post('/auth/twoFactorAuth',[TwoFactorAuthenticateController::class,'verifyToken'])->name('auth.verifyToken');

Route::prefix('course')->group(function(){
    Route::get('all',[\App\Http\Controllers\Frontend\CourseController::class,'all'])->name('all.courses');
    Route::get('show/{course}',[\App\Http\Controllers\Frontend\CourseController::class,'showCourse'])->name('show.course');
});
Route::prefix('course')->group(function(){
    Route::get('{gradeName}/',[\App\Http\Controllers\Frontend\CourseController::class,'gradeCourses'])->name('gradeCourses');
});
Route::get('/free/lessons',[\App\Http\Controllers\LessonController::class,'free'])->name('free.lessons');
Route::get('about',[HomeController::class,'about'])->name('about');
Route::get('contact',[HomeController::class,'contact'])->name('contact');
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');
Route::get('ask',[HomeController::class,'faq'])->name('faq');
Route::get('terms-of-service',[HomeController::class,'termsOfService'])->name('termsOfService');




//Route::get("/spot/{orderId}/{spot}",[\App\Http\Controllers\PaymentController::class,'paymentSuccess']);
Route::get('/spotx', [HomeController::class, 'refreshCookie']);
Route::post('/send-otp', [OtpLoginController::class, 'sendOtp'])->name('otp.send');
Route::post('/verify-otp', [OtpLoginController::class, 'verifyOtp'])->name('otp.verify');

// player
Route::get('/play/{lesson}',[HomeController::class,'play'])->name('play');
Route::get('/play-course/{course}',[HomeController::class,'playFreeCourse'])->name('playFreeCourse');
Route::get('/playCourse/{course}',[HomeController::class,'playCourse'])->middleware('auth')->name('playCourse');
// click slider increament
Route::post('slider/click/{slider}',[SliderController::class,'click'])->name('slider.click');

require __DIR__.'/auth.php';
