<?php

namespace Domain\Account\Policies;

use Domain\Account\Models\User;
use Domain\Account\Models\Profile;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
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
        return false;
    }

    /**
     * Determine whether the user can view the user.
     *
     * @param  \Domain\Account\Models\User  $user
     * @param  \Domain\Account\Models\Profile  $profile
     *
     * @return mixed
     */
    public function view(User $user, Profile $profile)
    {
        return false;
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
        return false;
    }

    /**
     * Determine whether the user can update the user.
     *
     * @param  \Domain\Account\Models\User  $user
     * @param  \Domain\Account\Models\Profile  $profile
     *
     * @return mixed
     */
    public function update(User $user, Profile $profile)
    {
        return $user->is($profile);
    }

    /**
     * Determine whether the user can delete the user.
     *
     * @param  \Domain\Account\Models\User  $user
     * @param  \Domain\Account\Models\Profile  $profile
     *
     * @return mixed
     */
    public function delete(User $user, Profile $profile)
    {
        return $user->is($profile)
            && $profile->email !== 'admin@anodyne-productions.com';
    }

    /**
     * Determine whether the user can restore the user.
     *
     * @param  \Domain\Account\Models\User  $user
     * @param  \Domain\Account\Models\Profile  $profile
     *
     * @return mixed
     */
    public function restore(User $user, Profile $profile)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the user.
     *
     * @param  \Domain\Account\Models\User  $user
     * @param  \Domain\Account\Models\Profile  $profile
     *
     * @return mixed
     */
    public function forceDelete(User $user, Profile $profile)
    {
        return false;
    }
}
