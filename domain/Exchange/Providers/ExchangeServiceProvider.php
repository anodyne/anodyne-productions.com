<?php

declare(strict_types = 1);

namespace Domain\Exchange\Providers;

use Domain\Account\Role;
use Domain\DomainServiceProvider;
use Domain\Exchange\Livewire\ShowProducts;
use Illuminate\Support\Facades\Gate;

class ExchangeServiceProvider extends DomainServiceProvider
{
    protected $livewireComponents = [
        'exchange:show-products' => ShowProducts::class,
    ];

    public function boot()
    {
        parent::boot();

        Gate::before(function ($user) {
            if ($user->role === Role::ADMIN) {
                return true;
            }
        });
    }
}
