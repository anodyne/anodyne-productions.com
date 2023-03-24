<?php

declare(strict_types=1);

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\Addon;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AddonPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if (in_array($user->role, [UserRole::admin, UserRole::staff])) {
            return true;
        }
    }

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Addon $addon): bool
    {
        return $addon->user->is($user);
    }

    public function create(User $user): bool
    {
        return $user->is_addon_author;
    }

    public function update(User $user, Addon $addon): bool
    {
        return $user->is_addon_author && $addon->user->is($user);
    }

    public function delete(User $user, Addon $addon): bool
    {
        return $user->is_addon_author && $addon->user->is($user);
    }

    public function restore(User $user, Addon $addon): bool
    {
        return $user->is_addon_author && $addon->user->is($user);
    }

    public function forceDelete(User $user, Addon $addon): bool
    {
        return $user->is_addon_author && $addon->user->is($user);
    }

    public function overrideCompatibility(User $user, Addon $addon): bool
    {
        return $user->isAdmin;
    }
}
