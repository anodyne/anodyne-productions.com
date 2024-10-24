<?php

use App\Http\Controllers\Api\AddonLatestVersionController;
use App\Http\Controllers\Api\LatestVersionController;
use App\Http\Controllers\Api\RegisterGameController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/games', RegisterGameController::class);

Route::get('/nova/latest-version', LatestVersionController::class);

Route::get('/addon/{slug}/latest-version', AddonLatestVersionController::class);
