<?php

use Illuminate\Support\Facades\Route;
use Modules\Like\Http\Controllers\LikeController;

Route::middleware(['auth'])->group(function () {
    Route::post(
        'like/toggle',
        [LikeController::class, 'toggle']
    )->name('like.toggle');
});
