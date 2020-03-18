<?php

use Domain\Support\Http\Controllers\SupportLandingPageController;

Route::prefix('support')
    ->name('support.')
    ->group(function () {
        Route::get('/', SupportLandingPageController::class)->name('index');
        // Route::get('contact', ContactController::class)->name('contact');
    });
