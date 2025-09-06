<?php

use Illuminate\Support\Facades\Route;
use Modules\File\Http\Controllers\Admin\FileController;
use Modules\File\Http\Controllers\User\FileController as UserFileController;
use Modules\File\Http\Controllers\Frontend\FileController as FrontendFileController;

Route::middleware(['auth', 'admin.auth'])->prefix('admin')->group(function () {
    Route::resource('files', FileController::class)->names('admin.files');
});

Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::get('files', [UserFileController::class,'index'])->name('user.files.index');
    Route::get('files/{file}/download', [UserFileController::class, 'download'])
        ->name('user.files.download')
        ->middleware('signed');
});

// front end routes
Route::get('files',[FrontendFileController::class,'index'])->name('files');
