<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\Http\Controllers\Admin\BlogController;
use Modules\Blog\Http\Controllers\Admin\CategoryController;

Route::middleware(['auth','admin.auth'])->group(function () {
    Route::resource('blogs', BlogController::class)->names('admin.blogs');
    Route::resource('categories', BlogController::class)->names('admin.categories');
});

Route::get('articles',[\Modules\Blog\Http\Controllers\Frontend\BlogController::class,'index'])->name('articles');
Route::get('article/show/{blog}',[\Modules\Blog\Http\Controllers\Frontend\BlogController::class,'show'])->name('article.show');
