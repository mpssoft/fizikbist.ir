<?php

use Illuminate\Support\Facades\Route;
use Modules\LessonPlan\Http\Controllers\LessonPlanController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('lessonplans', LessonPlanController::class)->names('lessonplan');
});
