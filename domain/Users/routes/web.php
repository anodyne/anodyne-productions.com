<?php

use Domain\Users\Livewire\ManageUsers;
use Illuminate\Support\Facades\Route;

Route::get('/users', ManageUsers::class)
    ->middleware('auth')
    ->name('users');
