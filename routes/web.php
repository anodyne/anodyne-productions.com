<?php

use App\Http\Controllers\DocsController;
use App\Http\Livewire\AddonsDisplay;
use App\Http\Livewire\AddonsList;
use App\Models\Release;
use App\Models\Sponsor;
use Illuminate\Support\Facades\Route;

Route::get('/nova', function () {
    $release = Release::query()
        ->where('published', true)
        ->latest('date')
        ->first();

    $sponsors = Sponsor::query()
        ->active()
        ->premiumTier()
        ->shouldBeDisplayed()
        ->get()
        ->sortBy('formattedName');

    return view('nova-2', [
        'latestVersion' => $release->version,
        'sponsors' => $sponsors,
    ]);
})->name('home');

Route::view('/nova-3', 'nova-3')->name('nova-3');
Route::view('/nova-3/features', 'nova-3-features')->name('nova-3-features');

Route::get('/docs/{version?}/{page?}', DocsController::class)
    ->where('page', '(.*)')
    ->name('docs');

Route::get('/addons', AddonsList::class)->name('addons.index');
Route::get('/addons/{addon}', AddonsDisplay::class)->name('addons.show');

Route::redirect('/', '/nova');
