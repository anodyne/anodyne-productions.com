<?php

use Domain\Exchange\Livewire\ShowProducts;
use Illuminate\Support\Facades\Route;

Route::get('/exchange', ShowProducts::class)->name('exchange.index');
