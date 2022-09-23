<?php

use Domain\Exchange\Livewire\ShowAddons;
use Illuminate\Support\Facades\Route;

Route::get('/exchange', ShowAddons::class)->name('exchange.index');
