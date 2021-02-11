<?php

declare(strict_types = 1);

namespace Domain\Users\Providers;

use Domain\DomainServiceProvider;
use Domain\Users\Livewire\ManageUsers;
use Domain\Users\Models\User;
use Domain\Users\Policies\UserPolicy;

class UserServiceProvider extends DomainServiceProvider
{
    protected $livewireComponents = [
        'users:manage-users' => ManageUsers::class,
    ];

    protected $policies = [
        User::class => UserPolicy::class,
    ];
}
