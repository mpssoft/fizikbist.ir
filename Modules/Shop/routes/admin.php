<?php

use Illuminate\Support\Facades\Route;
use Modules\Shop\Http\Controllers\DiscountController;

Route::resource('discounts', DiscountController::class);
