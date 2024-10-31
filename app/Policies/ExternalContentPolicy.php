<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\ExternalContent;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ExternalContentPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): Response
    {
        return $user->isAdmin || $user->isStaff
            ? $this->allow()
            : $this->deny();
    }

    public function view(User $user, ExternalContent $content): Response
    {
        return $user->isAdmin || $user->isStaff
            ? $this->allow()
            : $this->deny();
    }

    public function create(User $user): Response
    {
        return $user->isAdmin
            ? $this->allow()
            : $this->deny();
    }

    public function update(User $user, ExternalContent $content): Response
    {
        return $user->isAdmin
            ? $this->allow()
            : $this->deny();
    }

    public function delete(User $user, ExternalContent $content): Response
    {
        return $user->isAdmin
            ? $this->allow()
            : $this->deny();
    }

    public function restore(User $user, ExternalContent $content): Response
    {
        return $this->denyWithStatus(418);
    }

    public function forceDelete(User $user, ExternalContent $content): Response
    {
        return $this->denyWithStatus(418);
    }
}
