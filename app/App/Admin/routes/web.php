<?php

use Illuminate\Support\Facades\Route;
use App\Admin\Controllers\UserController;
use App\Admin\Controllers\DashboardController;

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', DashboardController::class)->name('dashboard');

        Route::resource('users', UserController::class);
    });
