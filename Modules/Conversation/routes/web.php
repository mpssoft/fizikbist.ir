<?php

use Illuminate\Support\Facades\Route;
use Modules\Conversation\Http\Controllers\ConversationController;

Route::middleware(['auth'])->prefix('conversation')->group(function () {
    Route::get('index', [ConversationController::class,'index'])->name('conversation.index');
    Route::post('send', [ConversationController::class, 'send'])->name('conversation.send');
    Route::get('unseen', [ConversationController::class, 'fetchUnseen'])->name('conversation.unseen');
});
Route::middleware(['auth','admin.auth'])->prefix('conversation')->group(function () {
    Route::delete('clear', [ConversationController::class, 'clear'])->name('conversation.clear');
});
