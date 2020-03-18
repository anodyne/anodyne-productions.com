<?php

namespace Domain\Account\Actions;

use Domain\Account\Models\User;
use Domain\Account\DataTransferObjects\UserData;

class UpdateUser
{
    public function execute(User $user, UserData $data): User
    {
        return tap($user)->update($data->toArray());
    }
}
