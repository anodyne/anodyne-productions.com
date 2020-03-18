<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    Route::view('/', 'home')->name('home');

    Route::files([
        base_path('app/App/Account/routes/web.php'),
        base_path('app/App/Admin/routes/web.php'),
        base_path('app/App/Login/routes/web.php'),
    ]);
});
