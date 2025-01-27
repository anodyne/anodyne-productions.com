<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AddonListLayout extends Component
{
    public function __construct(
        public string $title,
        public ?string $description = null,
        public ?string $eyebrow = null
    ) {}

    public function render()
    {
        return view('layouts.addon-list');
    }
}
