<?php

use Illuminate\Support\Facades\Route;
use Modules\LessonPlan\Http\Controllers\LessonPlanController;
use Modules\LessonPlan\Http\Controllers\Frontend\LessonPlanController as FrontController ;

Route::middleware(['auth'])->group(function () {
    Route::resource('lessonplans', LessonPlanController::class)->names('lessonplan');
});
Route::middleware(['web'])->group(function () {
    Route::get('lesson-plan', [FrontController::class,'index'])->name('lesson-plan');
});
