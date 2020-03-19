<?php

namespace Domain\Account\Policies;

use Domain\Account\Models\Role;
use Domain\Account\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->can('role.*');
    }

    public function view(User $user, Role $role)
    {
        return $user->can('role.view');
    }

    public function create(User $user)
    {
        return $user->can('role.create');
    }

    public function update(User $user, Role $role)
    {
        return $user->can('role.update');
    }

    public function delete(User $user, Role $role)
    {
        return $user->can('role.delete');
    }

    public function restore(User $user, Role $role)
    {
        return false;
    }

    public function forceDelete(User $user, Role $role)
    {
        return false;
    }
}
