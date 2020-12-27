<?php

use Domain\Docs\Controllers\DocsController;
use Illuminate\Support\Facades\Route;

Route::get('/docs/{version?}/{page?}', DocsController::class)->name('docs');
