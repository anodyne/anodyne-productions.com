<?php

namespace Domain\Account\Providers;

use Domain\Account\Models\Role;
use Domain\Account\Models\User;
use Domain\DomainServiceProvider;
use Domain\Account\Models\Profile;
use Domain\Account\Policies\RolePolicy;
use Domain\Account\Policies\UserPolicy;
use Domain\Account\Policies\ProfilePolicy;

class AccountServiceProvider extends DomainServiceProvider
{
    protected $policies = [
        Profile::class => ProfilePolicy::class,
        Role::class => RolePolicy::class,
        User::class => UserPolicy::class,
    ];
}
