<?php

use App\Http\Controllers\customer\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('customer')->middleware('auth', 'customer')->name('customer.')->group(function () {
    Route::resource('dashboard', DashboardController::class);
});
