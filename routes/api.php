<?php

use App\Http\Controllers\Api\AddonLatestVersionController;
use App\Http\Controllers\Api\GetExternalChangelogController;
use App\Http\Controllers\Api\GetExternalContentController;
use App\Http\Controllers\Api\LatestVersionController;
use App\Http\Controllers\Api\RegisterGameController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/games', RegisterGameController::class)->name('api.register-game');

Route::get('/nova/latest-version', LatestVersionController::class);
Route::get('/nova/external-changelog', GetExternalChangelogController::class);
Route::get('/nova/external-content', GetExternalContentController::class);

Route::get('/addon/latest-version', AddonLatestVersionController::class);
