<?php

use Illuminate\Support\Facades\Route;
use App\Admin\Controllers\UserController;

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::view('/', 'admin.dashboard')->name('dashboard');

        Route::resource('users', UserController::class);
    });
