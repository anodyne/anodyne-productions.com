<?php

Route::view('/', 'marketing.home')->name('home');
Route::view('/nova', 'welcome')->name('nova');
Route::view('/nova-nextgen', 'welcome')->name('nova-nextgen');
Route::view('/contact', 'welcome')->name('contact');
Route::view('/terms-of-use', 'welcome')->name('terms-of-use');
Route::view('/privacy-policy', 'welcome')->name('privacy-policy');
