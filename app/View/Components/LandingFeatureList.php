<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LandingFeatureList extends Component
{
    public string $gradientDirection;

    public string $gradientStart;

    public string $gradientStop;

    public string $color;

    public function __construct(
        $gradientStart,
        $gradientStop,
        $color,
        $gradientDirection = 'br'
    ) {
        $this->gradientDirection = $gradientDirection;
        $this->gradientStart = $gradientStart;
        $this->gradientStop = $gradientStop;
        $this->color = $color ?: $gradientStop;
    }

    public function render()
    {
        return view('components.landing.components.feature-list');
    }
}
