<?php

use Illuminate\Support\Facades\Route;
use Modules\Splash\Http\Controllers\SplashController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('splashes', SplashController::class)->names('splash');
});
