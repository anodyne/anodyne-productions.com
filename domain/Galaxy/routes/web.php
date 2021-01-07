<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/galaxy')->group(function () {
    Route::view('/', 'galaxy.index')->name('galaxy.index');
});
