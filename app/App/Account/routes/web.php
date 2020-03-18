<?php

use Illuminate\Support\Facades\Route;
use App\Account\Controllers\AccountInfoController;
use App\Account\Controllers\ShowProfileController;
use App\Account\Controllers\DeleteAccountController;
use App\Account\Controllers\ConfirmDeleteAccountController;

Route::middleware('auth')->group(function () {
    Route::prefix('account')
        ->name('account.')
        ->group(function () {
            Route::get('/', [AccountInfoController::class, 'edit'])->name('info');
            Route::put('/', [AccountInfoController::class, 'update'])->name('info.update');

            Route::get('delete', ConfirmDeleteAccountController::class)->name('delete');
            Route::delete('delete', DeleteAccountController::class)->name('destroy');
        });
});

Route::get('profile/{user:username}', ShowProfileController::class)->name('profile.show');
