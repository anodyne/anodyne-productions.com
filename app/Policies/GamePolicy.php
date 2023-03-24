<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Game;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class GamePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): Response
    {
        return $user->isAdmin || $user->isStaff
            ? $this->allow()
            : $this->deny();
    }

    public function view(User $user, Game $game): Response
    {
        return $user->isAdmin || $user->isStaff
            ? $this->allow()
            : $this->deny();
    }

    public function create(User $user): Response
    {
        return $this->deny();
    }

    public function update(User $user, Game $game): Response
    {
        return $this->deny();
    }

    public function delete(User $user, Game $game): Response
    {
        return $this->deny();
    }

    public function restore(User $user, Game $game): Response
    {
        return $this->deny();
    }

    public function forceDelete(User $user, Game $game): Response
    {
        return $this->deny();
    }
}
