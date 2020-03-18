<?php

use Domain\Marketing\Http\Controllers\LandingPageController;
use Domain\Marketing\Http\Controllers\NovaLandingPageController;

Route::get('/', LandingPageController::class)->name('home');
Route::get('/nova', NovaLandingPageController::class)->name('nova');

Route::view('/nova-nextgen', 'welcome')->name('nova-nextgen');
Route::view('/contact', 'welcome')->name('contact');
Route::view('/terms-of-use', 'welcome')->name('terms-of-use');
Route::view('/privacy-policy', 'welcome')->name('privacy-policy');
