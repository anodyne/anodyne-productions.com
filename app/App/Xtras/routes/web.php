<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    Route::prefix('xtras')
        ->name('xtras.')
        ->group(function () {
            Route::view('/', 'xtras.index')->name('index');
            Route::view('themes', 'xtras.themes')->name('themes');
            Route::view('detail', 'xtras.detail')->name('detail');
        });
});
