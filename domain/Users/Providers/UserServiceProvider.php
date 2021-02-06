<?php

declare(strict_types = 1);

namespace Domain\Users\Providers;

use Domain\DomainServiceProvider;
use Domain\Users\Livewire\ShowUsers;

class UserServiceProvider extends DomainServiceProvider
{
    protected $livewireComponents = [
        'users:show-users' => ShowUsers::class,
    ];
}
