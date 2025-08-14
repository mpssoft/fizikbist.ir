<?php

use Illuminate\Support\Facades\Route;
use Modules\Cart\Http\Controllers\CartController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('carts', CartController::class)->names('cart');
});
