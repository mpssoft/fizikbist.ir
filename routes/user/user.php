<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\User\panel\UserPanelController;
use Illuminate\Support\Facades\Route;

Route::get("/",[UserPanelController::class,'home'])->name('home');

Route::get('/courses',[\App\Http\Controllers\User\panel\UserCourseController::class,'courses'])->name('courses');
Route::middleware(['auth'])->group(function(){
    Route::get('/buy/{course}', [PaymentController::class, 'createOrder'])->name('create.order');
    Route::get('/payment/zarinpalCallback',[PaymentController::class,'zarinpalCallback']);
    Route::get('/payment/success/{orderId}', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
});

