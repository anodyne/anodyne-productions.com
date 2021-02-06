<?php

declare(strict_types = 1);

namespace Domain\Users\Providers;

use Domain\DomainServiceProvider;
use Domain\Users\Livewire\ManageUsers;

class UserServiceProvider extends DomainServiceProvider
{
    protected $livewireComponents = [
        'users:manage-users' => ManageUsers::class,
    ];
}
