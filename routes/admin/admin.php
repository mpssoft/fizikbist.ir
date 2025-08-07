<?php

use App\Http\Controllers\Admin\panel\AdminCourseController;
use App\Http\Controllers\Admin\panel\AdminPanelController;
use Illuminate\Support\Facades\Route;

Route::get("/",[AdminPanelController::class,'home'])->name('home');


Route::resource('courses', \App\Http\Controllers\Admin\panel\AdminCourseController::class)->names('courses');
Route::resource('sliders', \App\Http\Controllers\Admin\panel\SliderController::class)->names('sliders');



