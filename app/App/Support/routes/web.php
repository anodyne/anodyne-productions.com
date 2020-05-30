<?php

use Illuminate\Support\Facades\Route;
use App\Support\Controllers\SearchForumController;
use App\Support\Controllers\SendContactEmailController;

Route::middleware('web')->group(function () {
    Route::prefix('support')
        ->name('support.')
        ->group(function () {
            Route::view('/', 'support.index')->name('index');
            Route::view('chat', 'support.chat')->name('chat');
            Route::view('contact', 'support.contact')->name('contact');
            Route::post('contact', SendContactEmailController::class)->name('contact.send');
            Route::get('forum-search', SearchForumController::class)->name('forum-search');
        });
});
