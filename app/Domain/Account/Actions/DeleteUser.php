<?php

namespace Domain\Account\Actions;

use Domain\Account\Models\User;

class DeleteUser
{
    public function execute(User $user): User
    {
        return tap($user)->delete();
    }
}
