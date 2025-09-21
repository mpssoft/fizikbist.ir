<?php

use Illuminate\Support\Facades\Route;
use Modules\LessonPlan\Http\Controllers\Admin\LessonPlanController;
use Modules\LessonPlan\Http\Controllers\Frontend\LessonPlanController as FrontController ;

Route::middleware(['auth','admin.auth'])->group(function () {
    Route::resource('lessonplans', LessonPlanController::class)->names('admin.lessonplans');
    Route::put('lessonplans/changeStatus/{lessonPlan}',[LessonPlanController::class,'changeStatus'])->name('admin.lessonplans.changeStatus');
    Route::get('lesson-plan/{lessonplan}/search-items', [LessonPlanController::class,'searchItems']);
    Route::post('lesson-plan/{lessonplan}/attach-single-item', [LessonPlanController::class,'attachSingleItem']);
    Route::post('lesson-plan/{lessonplan}/detach-single-item', [LessonPlanController::class,'detachSingleItem']);


});
Route::middleware(['auth'])->group(function () {
    Route::post('/lesson-plan/create', [\Modules\LessonPlan\Http\Controllers\Frontend\LessonPlanController::class, 'store'])->name('lesson-plan.create');
});
Route::middleware(['web'])->group(function () {
    Route::get('lesson-plan', [FrontController::class,'index'])->name('lesson-plan');
});
