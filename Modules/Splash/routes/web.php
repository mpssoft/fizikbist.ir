<?php

use Illuminate\Support\Facades\Route;
use Modules\Splash\Http\Controllers\SplashController;

Route::middleware(['auth', 'admin.auth'])->group(function () {
    Route::resource('splashes', SplashController::class)->names('admin.splashes');
});

Route::middleware(['web'])->group(function () {
    Route::get('get-splash', [SplashController::class,'getSplash'])->name('get.splash');
});
