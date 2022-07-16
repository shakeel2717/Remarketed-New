<?php

use App\Http\Controllers\user\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\WarehouseController;
use App\Http\Controllers\user\CustomerController;
use App\Http\Controllers\user\RmaController;
use App\Http\Controllers\user\SupplierController;
use App\Http\Controllers\user\InventoryController;
use App\Http\Controllers\user\RefundController;
use App\Http\Controllers\user\OrderController;

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
