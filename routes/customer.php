<?php

use App\Http\Controllers\customer\DashboardController;
use App\Http\Controllers\customer\InventoryController;
use App\Http\Controllers\customer\RefundController;
use Illuminate\Support\Facades\Route;

Route::prefix('customer')->middleware('auth', 'customer')->name('customer.')->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('inventory', InventoryController::class);
    Route::resource('refund', RefundController::class);

});
