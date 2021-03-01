<?php

namespace Domain\Users\Policies;

use Domain\Users\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->isAdmin) {
            return true;
        }
    }

    public function viewAny(User $user): bool
    {
        return $user->isStaff;
    }

    public function view(User $user, User $model): bool
    {
        return $user->isStaff || $user->is($model);
    }

    public function create(User $user): bool
    {
        return $user->isStaff;
    }

    public function update(User $user, User $model): bool
    {
        return ($user->isStaff && $model->isUser)
            || $user->is($model);
    }

    public function delete(User $user, User $model): bool
    {
        return false;
    }

    public function updateRole(User $user, User $model): bool
    {
        return false;
    }

    public function updatePermissions(User $user, User $model): bool
    {
        if (! config('services.anodyne.exhange') && ! config('services.anodyne.galaxy')) {
            return false;
        }

        return $user->isStaff && $model->isUser && $model->isNot($user);
    }
}
