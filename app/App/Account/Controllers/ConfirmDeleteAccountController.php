<?php

namespace App\Account\Controllers;

use Illuminate\Http\Request;
use Domain\Account\Models\Profile;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ConfirmDeleteAccountController
{
    use AuthorizesRequests;

    public function __invoke(Request $request)
    {
        $profile = Profile::findOrFail($request->user()->id);

        $this->authorize('update', $profile);

        return view('account.delete', [
            'profile' => $profile,
        ]);
    }
}
