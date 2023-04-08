<?php

use App\Http\Controllers\DocsController;
use App\Http\Livewire\AddonDetail;
use App\Http\Livewire\AddonList;
use App\Models\Sponsor;
use Illuminate\Support\Facades\Route;

Route::get('/nova', function () {
    $sponsors = Sponsor::query()
        ->active()
        ->premiumTier()
        ->shouldBeDisplayed()
        ->get()
        ->sortBy('formattedName');

    return view('nova-2', [
        'sponsors' => $sponsors,
    ]);
})->name('home');

Route::view('/nova-3', 'nova-3')->name('nova-3');
Route::view('/nova-3/features', 'nova-3-features')->name('nova-3-features');

Route::get('/docs/{version?}/{page?}', DocsController::class)
    ->where('page', '(.*)')
    ->name('docs');

Route::get('/addons/{user:username?}', AddonList::class)->name('addons.index');
Route::get('/addons/{user:username}/{addon:slug}', AddonDetail::class)->name('addons.show');

Route::redirect('/', '/nova');
