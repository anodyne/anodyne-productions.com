<?php

namespace Domain\Account\Actions;

use Domain\Account\Models\User;
use Spatie\Activitylog\Models\Activity;

class ForceDeleteUser
{
    public function execute(User $user): User
    {
        Activity::causedBy($user)->delete();
        Activity::forSubject($user)->delete();

        return tap($user)->forceDelete();
    }
}
