<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

class MarketplaceController
{
    public function __invoke()
    {
        return view('marketplace');
    }
}
