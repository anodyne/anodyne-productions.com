<?php

namespace Domain\Account\Http\Controllers;

use App\Http\Controllers\Controller;
use Domain\Account\Events\AccountDeleted;
use Domain\Account\Http\Requests\UpdateAccountRequest;

class AccountDeleteController extends Controller
{
    public function edit()
    {
        return view()->component('AccountDelete', [
            'user' => auth()->user()
        ]);
    }

    public function destroy(UpdateAccountRequest $request)
    {
        $user = $request->user();

        event(new AccountDeleted($user->id));

        $user->destroy();

        $user->logout();

        return redirect()->route('home');
    }
}