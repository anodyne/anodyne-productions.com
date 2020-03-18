<?php

namespace Domain\Account\Http\Controllers;

use App\Http\Controllers\Controller;
use Domain\Account\Events\AccountUpdated;
use Domain\Account\Http\Requests\UpdateAccountRequest;

class AccountPreferencesController extends Controller
{
    public function edit()
    {
        return view()->component('AccountPreferences', [
            'user' => auth()->user()
        ]);
    }

    public function update(UpdateAccountRequest $request)
    {
        $user = $request->user();

        $user->update($request->validated());

        event(new AccountUpdated($user));

        return redirect()->route('account.info');
    }
}