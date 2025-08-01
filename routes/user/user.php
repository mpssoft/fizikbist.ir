<?php

use App\Http\Controllers\User\UserPanel\UserAdminPanelController;
use Illuminate\Support\Facades\Route;

Route::get("/",[UserAdminPanelController::class,'home'])->name('home');



