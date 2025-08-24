<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\User\panel\UserCourseController;
use App\Http\Controllers\User\panel\UserPanelController;
use Illuminate\Support\Facades\Route;

Route::get("/",[UserPanelController::class,'home'])->name('home');

Route::get('courses/',[UserCourseController::class,'courses'])->name('courses.index');
Route::get('courses/bought',[UserCourseController::class,'boughtCourses'])->name('bought-courses');
Route::middleware(['auth'])->group(function(){
    Route::get('/checkout', [PaymentController::class, 'createOrder'])->name('cart.checkout');
    Route::get('/payment/zarinpalCallback',[PaymentController::class,'zarinpalCallback'])->name('payment.zarinpalCallback');
    Route::get('/payment/success/{orderId}', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
});

