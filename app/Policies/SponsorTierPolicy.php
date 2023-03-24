<?php

namespace App\Policies;

use App\Models\SponsorTier;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SponsorTierPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin
            ? $this->allow()
            : $this->denyAsNotFound();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SponsorTier  $sponsorTier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, SponsorTier $sponsorTier)
    {
        return $user->isAdmin
            ? $this->allow()
            : $this->denyAsNotFound();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $this->denyAsNotFound();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SponsorTier  $sponsorTier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, SponsorTier $sponsorTier)
    {
        return $this->denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SponsorTier  $sponsorTier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, SponsorTier $sponsorTier)
    {
        return $this->denyAsNotFound();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SponsorTier  $sponsorTier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, SponsorTier $sponsorTier)
    {
        return $this->denyAsNotFound();
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\SponsorTier  $sponsorTier
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, SponsorTier $sponsorTier)
    {
        return $this->denyAsNotFound();
    }
}
