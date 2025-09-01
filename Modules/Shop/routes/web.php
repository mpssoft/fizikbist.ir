<?php

use Illuminate\Support\Facades\Route;
use Modules\Shop\Http\Controllers\CartController;
use Modules\Shop\Http\Controllers\ShopController;

Route::middleware(['auth'])->group(function () {
    Route::resource('shops', ShopController::class)->names('shop');
});


Route::prefix('cart')->name('shop.cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::get('/add/{model}/{id}', [CartController::class, 'add'])->name('add');
    Route::delete('/remove', [CartController::class, 'remove'])->name('remove');
    Route::post('/removeDiscount', [CartController::class, 'removeDiscount'])->name('removeDiscount');
    Route::post('/apply-discount', [CartController::class, 'applyDiscount'])->name('applyDiscount');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::post('/place-order', [CartController::class, 'placeOrder'])->name('placeOrder');
    Route::get('/items',[CartController::class,'cartItems'])->name('items');
});
