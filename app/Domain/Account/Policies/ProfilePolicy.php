<?php

namespace Domain\Account\Policies;

use Domain\Account\Models\User;
use Domain\Account\Models\Profile;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, Profile $profile)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, Profile $profile)
    {
        return $user->is($profile);
    }

    public function delete(User $user, Profile $profile)
    {
        return $user->is($profile)
            && $profile->email !== 'admin@anodyne-productions.com';
    }

    public function restore(User $user, Profile $profile)
    {
        return false;
    }

    public function forceDelete(User $user, Profile $profile)
    {
        return false;
    }
}
