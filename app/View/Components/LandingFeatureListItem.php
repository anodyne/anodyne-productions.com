<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LandingFeatureListItem extends Component
{
    public string $gradientDirection;

    public string $gradientStart;

    public string $gradientStop;

    public string $color;

    public string $title;

    public string $icon;

    public function __construct(
        $gradientStart,
        $gradientStop,
        $color,
        $title,
        $icon,
        $gradientDirection = 'br'
    ) {
        $this->gradientDirection = $gradientDirection;
        $this->gradientStart = $gradientStart;
        $this->gradientStop = $gradientStop;
        $this->color = $color ?: $gradientStop;
        $this->title = $title;
        $this->icon = $icon;
    }

    public function render()
    {
        return view('components.landing.components.feature-list-item');
    }
}
