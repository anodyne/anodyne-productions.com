<?php

use Domain\Marketplace\Controllers\MarketplaceController;
use Domain\Marketplace\Livewire\ShowProducts;
use Illuminate\Support\Facades\Route;

// Route::get('/marketplace', MarketplaceController::class)->name('marketplace');
Route::get('/marketplace', ShowProducts::class)->name('marketplace.index');
