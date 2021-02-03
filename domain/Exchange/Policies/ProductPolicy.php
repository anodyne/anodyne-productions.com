<?php

namespace Domain\Exchange\Policies;

use Domain\Exchange\Models\Product;
use App\Models\User;
use Domain\Account\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->role === Role::ADMIN || $user->role === Role::STAFF) {
            return true;
        }
    }

    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Product $product): bool
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->is_exchange_author;
    }

    public function update(User $user, Product $product)
    {
        return $product->user->is($user);
    }

    public function delete(User $user, Product $product)
    {
        return $product->user->is($user);
    }

    public function restore(User $user, Product $product)
    {
        return $product->user->is($user);
    }

    public function forceDelete(User $user, Product $product)
    {
        return $product->user->is($user);
    }
}
