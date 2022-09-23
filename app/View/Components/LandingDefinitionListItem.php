<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LandingDefinitionListItem extends Component
{
    public string $color;

    public string $icon;

    public string $title;

    public function __construct($color, $title, $icon = false)
    {
        $this->color = $color;
        $this->icon = $icon ?: 'fluent-checkmark';
        $this->title = $title;
    }

    public function render()
    {
        return view('components.landing.components.definition-list-item');
    }
}
