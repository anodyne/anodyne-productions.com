<?php

namespace App\Account\Controllers;

use Illuminate\Http\Request;
use Domain\Account\Models\Profile;
use Domain\Account\Actions\DeleteUser;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DeleteAccountController
{
    use AuthorizesRequests;

    public function __invoke(Request $request, DeleteUser $action)
    {
        $profile = Profile::findOrFail($request->user()->id);

        $this->authorize('delete', $profile);

        $action->execute($profile);

        auth()->logout();

        return redirect()->route('home');
    }
}
