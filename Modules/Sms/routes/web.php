<?php

use Illuminate\Support\Facades\Route;

use Modules\Sms\Http\Controllers\Admin\MessageTemplateController;
use Modules\Sms\Http\Controllers\Admin\SmsQueueController;


Route::resource('sms_queues',SmsQueueController::class)->names('sms_queues');

Route::resource('message_template',MessageTemplateController::class)->names('message_templates');

Route::post('sms_queues/start/{smsQueue}',[\Modules\Sms\Http\Controllers\Admin\SmsController::class,'start'])->name('sms_queue.start');
Route::post('sms_queues/ready/{smsQueue}',[\Modules\Sms\Http\Controllers\Admin\SmsController::class,'ready'])->name('sms_queue.ready');
