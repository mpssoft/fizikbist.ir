<?php

use Illuminate\Support\Facades\Route;
use Modules\Like\Http\Controllers\LikeController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('likes', LikeController::class)->names('like');
});
