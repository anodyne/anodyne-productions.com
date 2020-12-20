<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocsController;
use App\Http\Controllers\MarketplaceController;

Route::get('/', function () {
    return view('home');
});

Route::view('nova-3', 'nova-3')->name('nova-3');

Route::get('/docs/{version?}/{page?}', DocsController::class)->name('docs');

Route::get('/marketplace', MarketplaceController::class)->name('marketplace');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
