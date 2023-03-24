<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AddonsListLayout extends Component
{
    public function __construct(
        public string $title,
        public string $description,
        public ?string $eyebrow = null
    ) {
    }

    public function render()
    {
        return view('layouts.addons-list');
    }
}
