<?php

use App\Http\Controllers\User\panel\UserPanelController;
use Illuminate\Support\Facades\Route;

Route::get("/",[UserPanelController::class,'home'])->name('home');

Route::get('/courses',[\App\Http\Controllers\User\panel\UserCourseController::class,'courses'])->name('courses');



