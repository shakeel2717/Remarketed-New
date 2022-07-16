<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RmaController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\RefundController;
use App\Http\Controllers\OrderController;

Route::redirect('/', 'login');
Route::prefix('user')->middleware('auth', 'user')->name('user.')->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('warehouse', WarehouseController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('rma', RmaController::class);
    Route::resource('inventory', InventoryController::class);
    Route::resource('refund', RefundController::class);
    Route::resource('order', OrderController::class);
});

require __DIR__ . '/auth.php';
