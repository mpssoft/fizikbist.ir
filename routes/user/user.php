<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\User\ChatController;
use App\Http\Controllers\User\panel\UserCourseController;
use App\Http\Controllers\User\panel\UserMessageController;
use App\Http\Controllers\User\panel\UserPanelController;
use App\Http\Controllers\User\panel\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::get("/",[UserPanelController::class,'home'])->name('home');

Route::get('courses/',[UserCourseController::class,'courses'])->name('courses.index');
Route::get('courses/bought',[UserCourseController::class,'boughtCourses'])->name('courses.bought');

Route::get('/checkout', [PaymentController::class, 'createOrder'])->name('cart.checkout');
Route::get('/payment/zarinpalCallback',[PaymentController::class,'zarinpalCallback'])->name('payment.zarinpalCallback');
Route::get('/payment/success/{orderId}', [PaymentController::class, 'paymentSuccess'])->name('payment.success');

Route::resource('messages',UserMessageController::class);

Route::get('/messages/create/{user?}', [UserMessageController::class,'create'])->name('messages.create');

Route::get('/edit',[UserProfileController::class,'edit'])->name('profile.edit');
Route::put('/update',[UserProfileController::class,'update'])->name('profile.update');

Route::get('/chat',[ChatController::class,'show'])->name('chat.show');

Route::post('messages/mark-as-read/{message}',[UserMessageController::class,'markAsRead'])->name('messages.mark-as-read');
Route::post('/messages/{id}/reply', [UserMessageController::class, 'reply'])->name('messages.reply');
Route::post('/messages/send', [UserMessageController::class, 'send'])->name('messages.send');
