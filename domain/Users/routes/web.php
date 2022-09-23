<?php

use Domain\Users\Controllers\UsersController;
use Domain\Users\Livewire\ShowUsers;
use Illuminate\Support\Facades\Route;

Route::prefix('/users')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', ShowUsers::class)->name('users.index');
        Route::get('{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
    });
