<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DocsLayout extends Component
{
    public array $sections;

    public string $current;

    public string $version;

    public function __construct($sections = [], $current = '', $version = 'main')
    {
        $this->sections = $sections;
        $this->current = $current;
        $this->version = $version;
    }

    public function render()
    {
        return view('layouts.docs');
    }
}
