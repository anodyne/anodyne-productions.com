<?php

namespace App\Policies;

use App\Models\User;
use Domain\Account\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->role === Role::ADMIN) {
            return true;
        }
    }

    public function viewAny(User $user): bool
    {
        return $user->role === Role::STAFF;
    }

    public function view(User $user, User $model): bool
    {
        return $user->role === Role::STAFF || $user->is($model);
    }

    public function create(User $user): bool
    {
        return $user->role === Role::STAFF;
    }

    public function update(User $user, User $model): bool
    {
        return ($user->role === Role::STAFF && $model->role === Role::USER)
            || $user->is($model);
    }

    public function updateRole(User $user, User $model): bool
    {
        return false;
    }

    public function delete(User $user, User $model): bool
    {
        return ($user->role === Role::STAFF && $model->role === Role::USER)
            || $user->is($model);
    }
}
