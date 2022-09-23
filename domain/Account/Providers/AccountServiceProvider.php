<?php

declare(strict_types = 1);

namespace Domain\Account\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use Domain\DomainServiceProvider;

class AccountServiceProvider extends DomainServiceProvider
{
    protected $policies = [
        User::class => UserPolicy::class,
    ];
}
