<?php

namespace App\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class LandingPanel extends Component
{
    public string $gradientDirection;

    public string $gradientStart;

    public string $gradientStop;

    public string $rotate;

    public string $rotateDirection;

    public function __construct(
        $gradientStart,
        $gradientStop,
        $rotate,
        $gradientDirection = 'r'
    ) {
        $this->gradientDirection = $gradientDirection;
        $this->gradientStart = $gradientStart;
        $this->gradientStop = $gradientStop;
        $this->rotate = (Str::startsWith($rotate, '-')) ? substr($rotate, 1) : $rotate;
        $this->rotateDirection = (Str::startsWith($rotate, '-')) ? '-' : false;
    }

    public function rotation()
    {
        return "{$this->rotateDirection}skew-y-{$this->rotate} sm:skew-y-0 sm:{$this->rotateDirection}rotate-{$this->rotate}";
    }

    public function render()
    {
        return view('components.landing.components.panel');
    }
}
