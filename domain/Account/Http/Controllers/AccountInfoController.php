<?php

namespace Domain\Account\Http\Controllers;

use App\Http\Controllers\Controller;
use Domain\Account\Events\AccountUpdated;
use Domain\Account\Http\Requests\UpdateAccountInfoRequest;

class AccountInfoController extends Controller
{
    public function edit()
    {
        return view()->component('AccountInfo', [
            'user' => auth()->user()
        ]);
    }

    public function update(UpdateAccountInfoRequest $request)
    {
        $user = $request->user();

        $user->update($request->validated());

        event(new AccountUpdated($user));

        return redirect()->route('account.info');
    }
}