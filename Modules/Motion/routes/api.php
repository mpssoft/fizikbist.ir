<?php

use Illuminate\Support\Facades\Route;
use Modules\Motion\Http\Controllers\MotionController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('motions', MotionController::class)->names('motion');
});
