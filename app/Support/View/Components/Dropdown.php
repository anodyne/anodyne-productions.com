<?php

namespace Support\View\Components;

use Illuminate\View\Component;

class Dropdown extends Component
{
    public $triggerStyles;

    public function __construct($triggerStyles = null)
    {
        $this->triggerStyles = $triggerStyles;
    }

    public function dropdownDivider()
    {
        return 'border-t border-gray-100';
    }

    public function dropdownIcon()
    {
        return 'mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500';
    }

    public function dropdownLink()
    {
        return 'group flex items-center px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900';
    }

    public function render()
    {
        return view('components.dropdown');
    }
}
