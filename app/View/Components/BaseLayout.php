<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BaseLayout extends Component
{
    public string $bgColor;

    public string $textColor;

    public function __construct($bgColor = 'gray-100', $textColor = 'gray-500')
    {
        $this->bgColor = $bgColor;
        $this->textColor = $textColor;
    }

    public function render()
    {
        return view('layouts.base');
    }
}
