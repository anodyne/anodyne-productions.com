<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
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

    public function view(User $user, Product $product): bool
    {
        return $user->isStaff;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Product $product): bool
    {
        return false;
    }

    public function delete(User $user, Product $product): bool
    {
        return false;
    }

    public function restore(User $user, Product $product): bool
    {
        return false;
    }

    public function forceDelete(User $user, Product $product): bool
    {
        return false;
    }
}
