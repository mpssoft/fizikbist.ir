<?php

use Illuminate\Support\Facades\Route;
use Modules\LessonPlan\Http\Controllers\Admin\LessonPlanController;
use Modules\LessonPlan\Http\Controllers\FileUploadController;
use Modules\LessonPlan\Http\Controllers\Frontend\LessonPlanController as FrontController ;
use Modules\LessonPlan\Http\Controllers\LessonPlanFileController;
use Modules\LessonPlan\Http\Controllers\User\LessonPlanController as UserLessonController ;


Route::middleware(['auth','admin.auth'])->group(function () {
    Route::resource('lessonplans', LessonPlanController::class)->names('admin.lessonplans');
    Route::put('lessonplans/changeStatus/{lessonPlan}',[LessonPlanController::class,'changeStatus'])->name('admin.lessonplans.changeStatus');
    Route::get('lesson-plan/{lessonplan}/search-items', [LessonPlanController::class,'searchItems']);
    Route::post('lesson-plan/{lessonplan}/attach-single-item', [LessonPlanController::class,'attachSingleItem']);
    Route::post('lesson-plan/{lessonplan}/detach-single-item', [LessonPlanController::class,'detachSingleItem']);

    Route::get('/admin/lessonplan-files/{file}/download',[LessonPlanFileController::class, 'download']
    )->name('admin.lessonplan-files.download');

});
Route::middleware(['auth'])->prefix('user')->group(function () {
    Route::resource('lessonplans',UserLessonController::class)->names('user.lessonplans');
    Route::delete('/lessonplan-files/{attachment}',[\Modules\LessonPlan\Http\Controllers\LessonPlanFileController::class, 'destroy']
    )->name('lessonplan-files.destroy');

});
Route::middleware(['web'])->group(function () {
    Route::get('lesson-plan', [FrontController::class,'index'])->name('lesson-plan');
});
