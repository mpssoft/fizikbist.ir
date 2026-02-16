<?php

use Illuminate\Support\Facades\Route;
use Modules\Motion\Http\Controllers\Admin\MotionController;

Route::middleware(['auth', 'admin.auth'])->group(function () {
    Route::resource('motions', MotionController::class)->names('admin.motions');
});
