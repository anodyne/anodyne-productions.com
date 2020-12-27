<?php

declare(strict_types = 1);

namespace Domain\Marketplace\Providers;

use Domain\DomainServiceProvider;
use Domain\Marketplace\Livewire\ShowProducts;

class MarketplaceServiceProvider extends DomainServiceProvider
{
    protected $livewireComponents = [
        'marketplace:show-products' => ShowProducts::class,
    ];
}
