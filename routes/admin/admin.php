<?php

use App\Http\Controllers\Admin\panel\AdminCourseController;
use App\Http\Controllers\Admin\panel\AdminPanelController;
use App\Http\Controllers\Admin\panel\GradeController;
use Illuminate\Support\Facades\Route;
use Modules\Shop\Http\Controllers\DiscountController;

Route::get("/",[AdminPanelController::class,'home'])->name('home');


Route::resource('courses', \App\Http\Controllers\Admin\panel\AdminCourseController::class)->names('courses');
Route::resource('sliders', \App\Http\Controllers\Admin\panel\SliderController::class)->names('sliders');
Route::resource('lessons', \App\Http\Controllers\Admin\panel\AdminLessonController::class)->names('lessons');
Route::resource('grades', GradeController::class);


Route::get('edit-license/{course}',[AdminCourseController::class,'editUserCourseLicense'])->name('edit-license');
