<?php

namespace Domain\Account\Policies;

use Domain\Account\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->can('user.*');
    }

    public function view(User $user, User $actionableUser)
    {
        return $user->can('user.view');
    }

    public function create(User $user)
    {
        return $user->can('user.create');
    }

    public function update(User $user, User $actionableUser)
    {
        return $user->can('user.update');
    }

    public function delete(User $user, User $actionableUser)
    {
        return $user->can('user.delete')
            && $actionableUser->email !== 'admin@anodyne-productions.com';
    }

    public function restore(User $user, User $actionableUser)
    {
        return false;
    }

    public function forceDelete(User $user, User $actionableUser)
    {
        return false;
    }
}
