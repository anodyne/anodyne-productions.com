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

Route::files([
    base_path('domain/Docs/routes/web.php'),
    base_path('domain/Galaxy/routes/web.php'),
    base_path('domain/Marketplace/routes/web.php'),
]);
