<?php

use Illuminate\Support\Facades\Route;
use Domain\Marketplace\Livewire\ShowProducts;
use Domain\Marketplace\Controllers\MarketplaceController;

// Route::get('/marketplace', MarketplaceController::class)->name('marketplace');
Route::get('/marketplace', ShowProducts::class)->name('marketplace');
