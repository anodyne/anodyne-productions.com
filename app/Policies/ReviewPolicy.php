<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReviewPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $this->allow();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Review $review)
    {
        return $this->allow();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $this->deny();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Review $review)
    {
        return $user->isStaff || $user->isAdmin
            ? $this->allow()
            : $this->deny();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Review $review)
    {
        return $user->isStaff || $user->isAdmin
            ? $this->allow()
            : $this->deny();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Review $review)
    {
        return $this->deny();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Review $review)
    {
        return $this->deny();
    }
}
