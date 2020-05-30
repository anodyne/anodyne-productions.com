<?php

use Illuminate\Support\Facades\Route;
use App\Docs\Controllers\DocsController;

if (! defined('DEFAULT_VERSION')) {
    define('DEFAULT_VERSION', '2.6');
}

Route::prefix('docs')
    ->name('docs.')
    ->group(function () {
        Route::get('/', [DocsController::class, 'showRootPage'])->name('root');

        Route::get('{version}/{page?}', [DocsController::class, 'show'])->name('show');
    });
