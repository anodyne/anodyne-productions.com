<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BaseLayout extends Component
{
    public function __construct(
        public string $title = '',
        public bool $hasAppearanceModes = true
    ) {
    }

    public function render()
    {
        return view('layouts.base');
    }
}
