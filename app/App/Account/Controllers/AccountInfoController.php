<?php

namespace App\Account\Controllers;

use Inertia\Inertia;
use Domain\Account\Models\Profile;
use Domain\Account\Actions\UpdateUser;
use Domain\Account\Presenters\UserPresenter;
use Domain\Account\DataTransferObjects\UserData;
use App\Account\Requests\UpdateAccountInfoRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AccountInfoController
{
    use AuthorizesRequests;

    public function edit()
    {
        $user = Profile::findOrFail(auth()->user()->id);

        $this->authorize('update', $user);

        return Inertia::render('Account/BasicInfo', [
            'user' => UserPresenter::make($user)->preset('accountInfo')->get(),
        ]);
    }

    public function update(UpdateAccountInfoRequest $request, UpdateUser $action)
    {
        $user = Profile::findOrFail($request->user()->id);

        $this->authorize('update', $user);

        $action->execute($user, UserData::fromRequest($request));

        return back();
    }
}
