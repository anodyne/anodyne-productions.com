<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::view('nova-3', 'nova-3')->name('nova-3');

Route::files([
    base_path('domain/Docs/routes/web.php'),
    base_path('domain/Marketplace/routes/web.php'),
]);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
