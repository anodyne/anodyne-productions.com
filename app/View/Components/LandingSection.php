<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LandingSection extends Component
{
    public string $gradientDirection;

    public string $gradientStart;

    public string $gradientStop;

    public string $color;

    public string $icon;

    public string $heading;

    public string $title;

    public string $content;

    public function __construct(
        $gradientStart,
        $gradientStop,
        $gradientDirection = 'br',
        $color = false,
        $icon = false,
        $heading = false,
        $title = false,
        $content = false
    ) {
        $this->gradientDirection = $gradientDirection;
        $this->gradientStart = $gradientStart;
        $this->gradientStop = $gradientStop;
        $this->color = $color ?: $gradientStop;
        $this->icon = $icon;
        $this->heading = $heading;
        $this->title = $title;
        $this->content = $content;
    }

    public function render()
    {
        return view('components.landing.components.section');
    }
}
