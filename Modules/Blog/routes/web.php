<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\Admin\BlogController;

Route::middleware(['auth','admin.auth'])->group(function () {
    Route::resource('blogs', BlogController::class)->names('admin.blogs');
});

Route::get('tricks',[\Modules\Blog\Http\Controllers\Frontend\BlogController::class,'index'])->name('tricks');
