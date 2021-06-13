<?php

use GrahamCampbell\GitHub\GitHubManager;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'nova');

Route::get('/nova', function (GitHubManager $github) {
    $latestVersion = cache()->remember(
        'nova.latest-version',
        now()->addWeek(),
        fn () => $github->repo()->releases()->latest('anodyne', 'nova')['name']
    );

    return view('nova-2')->with([
        'latestVersion' => $latestVersion,
        'sponsors' => config('anodyne.sponsors'),
    ]);
})->name('home');

Route::view('/nova-3', 'nova-3')->name('nova-3');

Route::prefix('projects')
    ->name('projects.')
    ->group(function () {
        Route::view('/', 'projects.index')->name('index');
        Route::view('/identity', 'projects.identity')->name('identity');
        Route::view('/website', 'projects.website')->name('website');
        Route::view('/support', 'projects.support')->name('support');
        Route::view('/docs', 'projects.docs')->name('docs');
        Route::view('/exchange', 'projects.exchange')->name('exchange');
        Route::view('/galaxy', 'projects.galaxy')->name('galaxy');
    });

Route::files([
    base_path('domain/Docs/routes/web.php'),
    base_path('domain/Exchange/routes/web.php'),
    base_path('domain/Galaxy/routes/web.php'),
    base_path('domain/Users/routes/web.php'),
]);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
