<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AddonDetailLayout extends Component
{
    public function __construct(
        public string $title,
        public string $type
    ) {}

    public function render()
    {
        return view('layouts.addon-detail');
    }
}
