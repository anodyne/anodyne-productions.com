<?php

namespace App\Account\Controllers;

use Domain\Account\Models\User;
use Domain\Account\Presenters\UserPresenter;

class ShowProfileController
{
    public function __invoke(User $user)
    {
        return view('profile.show', [
            'user' => UserPresenter::make($user)->preset('profile')->get(),
        ]);
    }
}
