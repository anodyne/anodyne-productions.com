<?php

namespace Domain\Account\Policies;

use Domain\Account\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any user.
     *
     * @param  \Domain\Account\Models\User  $user
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('user.*');
    }

    /**
     * Determine whether the user can view the user.
     *
     * @param  \Domain\Account\Models\User  $user
     * @param  \Domain\Account\Models\User  $actionableUser
     *
     * @return mixed
     */
    public function view(User $user, User $actionableUser)
    {
        return $user->can('user.view');
    }

    /**
     * Determine whether the user can create users.
     *
     * @param  \Domain\Account\Models\User  $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('user.create');
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param  \Domain\Account\Models\User  $user
     * @param  \Domain\Account\Models\User  $actionableUser
     *
     * @return mixed
     */
    public function update(User $user, User $actionableUser)
    {
        return $user->can('user.update');
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  \Domain\Account\Models\User  $user
     * @param  \Domain\Account\Models\User  $actionableUser
     *
     * @return mixed
     */
    public function delete(User $user, User $actionableUser)
    {
        return $user->can('user.delete')
            && $actionableUser->email !== 'admin@anodyne-productions.com';
    }

    /**
     * Determine whether the user can restore the user.
     *
     * @param  \Domain\Account\Models\User  $user
     * @param  \Domain\Account\Models\User  $actionableUser
     *
     * @return mixed
     */
    public function restore(User $user, User $actionableUser)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the user.
     *
     * @param  \Domain\Account\Models\User  $user
     * @param  \Domain\Account\Models\User  $actionableUser
     *
     * @return mixed
     */
    public function forceDelete(User $user, User $actionableUser)
    {
        return false;
    }
}
