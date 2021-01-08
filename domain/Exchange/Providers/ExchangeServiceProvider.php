<?php

declare(strict_types = 1);

namespace Domain\Exchange\Providers;

use Domain\DomainServiceProvider;
use Domain\Exchange\Livewire\ShowProducts;

class ExchangeServiceProvider extends DomainServiceProvider
{
    protected $livewireComponents = [
        'exchange:show-products' => ShowProducts::class,
    ];
}
