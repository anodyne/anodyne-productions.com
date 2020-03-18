<?php

namespace Domain\Account\Policies;

use Domain\Account\Models\Role;
use Domain\Account\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any role.
     *
     * @param  \Domain\Account\Models\User  $user
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('role.*');
    }

    /**
     * Determine whether the user can view the role.
     *
     * @param  \Domain\Account\Models\User  $user
     * @param  \Domain\Account\Models\Role  $role
     *
     * @return mixed
     */
    public function view(User $user, Role $role)
    {
        return $user->can('role.view');
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \Domain\Account\Models\User  $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('role.create');
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \Domain\Account\Models\User  $user
     * @param  \Domain\Account\Models\Role  $role
     *
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
        return $user->can('role.update');
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \Domain\Account\Models\User  $user
     * @param  \Domain\Account\Models\Role  $role
     *
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
        return $user->can('role.delete');
    }

    /**
     * Determine whether the user can restore the role.
     *
     * @param  \Domain\Account\Models\User  $user
     * @param  \Domain\Account\Models\Role  $role
     *
     * @return mixed
     */
    public function restore(User $user, Role $role)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the role.
     *
     * @param  \Domain\Account\Models\User  $user
     * @param  \Domain\Account\Models\Role  $role
     *
     * @return mixed
     */
    public function forceDelete(User $user, Role $role)
    {
        return false;
    }
}
