<?php

use GrahamCampbell\GitHub\GitHubManager;
use Illuminate\Support\Facades\Route;

Route::get('/', function (GitHubManager $github) {
    $latestVersion = cache()->remember(
        'nova.latest-version',
        now()->addWeek(),
        fn () => $github->repo()->releases()->latest('anodyne', 'nova')['name']
    );

    return view('landing-2', compact('latestVersion'));
})->name('home');

Route::view('/nova-3', 'nova-3')->name('nova-3');

Route::files([
    base_path('domain/Docs/routes/web.php'),
    base_path('domain/Exchange/routes/web.php'),
    base_path('domain/Galaxy/routes/web.php'),
]);
