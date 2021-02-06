<?php

use Domain\Users\Livewire\ManageUsers;
use Illuminate\Support\Facades\Route;

Route::prefix('/users')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', ManageUsers::class)->name('users.index');
    });
