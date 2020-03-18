<?php

use Domain\Account\Http\Controllers\AccountInfoController;
use Domain\Account\Http\Controllers\AccountDeleteController;
use Domain\Account\Http\Controllers\AccountPreferencesController;
use Domain\Account\Http\Controllers\AccountNotificationsController;

Route::group(['prefix' => 'account'], function () {
    Route::get('/info', [AccountInfoController::class, 'edit'])->name('account.info');
    Route::patch('/info', [AccountInfoController::class, 'update'])->name('account.info.update');

    Route::get('/preferences', [AccountPreferencesController::class, 'edit'])->name('account.preferences');
    Route::patch('/preferences', [AccountPreferencesController::class, 'update'])->name('account.preferences.update');

    Route::get('/notifications', [AccountNotificationsController::class, 'edit'])->name('account.notifications');
    Route::patch('/notifications', [AccountNotificationsController::class, 'update'])->name('account.notifications.update');

    Route::get('/delete', [AccountDeleteController::class, 'edit'])->name('account.delete');
    Route::delete('/delete', [AccountDeleteController::class, 'update'])->name('account.delete.destroy');
});
