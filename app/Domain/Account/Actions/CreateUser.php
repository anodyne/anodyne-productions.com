<?php

namespace Domain\Account\Actions;

use Domain\Account\Models\User;
use Domain\Account\DataTransferObjects\UserData;

class CreateUser
{
    public function execute(UserData $data): User
    {
        return User::create($data->toArray());
    }
}
