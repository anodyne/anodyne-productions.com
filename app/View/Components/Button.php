<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public function __construct(
        public ?string $href = null,
        public string $variant = 'hero',
        public string $size = 'md'
    ) {
    }

    public function baseStyles()
    {
        return 'group relative inline-flex items-center justify-center transition-all rounded-full leading-none font-sans font-semibold';
    }

    public function variantStyles()
    {
        return [
            'brand' => 'bg-purple-500 hover:bg-purple-600 text-white ring-1 ring-inset ring-black/15 transition-all after:block after:absolute after:-inset-[1px] after:rounded-full after:bg-gradient-to-t dark:after:bg-gradient-to-b after:from-black/5 dark:after:from-white/5 after:opacity-50 hover:after:opacity-100 after:transition-opacity',
            'primary' => 'bg-slate-700 dark:bg-white hover:bg-slate-600 dark:hover:bg-slate-200 text-white dark:text-slate-600 ring-1 ring-inset ring-black/15 transition-all after:block after:absolute after:-inset-[1px] after:rounded-full after:bg-gradient-to-t after:from-black/5 after:opacity-50 hover:after:opacity-100 after:transition-opacity',
            'secondary' => 'bg-slate-200/50 dark:bg-slate-700 hover:bg-slate-200/70 dark:hover:bg-slate-600 text-slate-600 dark:text-white ring-1 ring-inset ring-black/15 transition-all after:block after:absolute after:-inset-[1px] after:rounded-full after:bg-gradient-to-t dark:after:bg-gradient-to-b after:from-black/5 dark:after:from-white/5 after:opacity-50 hover:after:opacity-100 after:transition-opacity',
            'text' => 'font-semibold text-slate-700 hover:text-slate-900 transition',
        ][$this->variant];
    }

    public function sizeStyles()
    {
        return [
            'xs' => 'py-2 px-3 text-xs',
            'sm' => 'py-2.5 px-3.5 text-sm',
            'md' => 'py-3 px-5 text-base',
        ][$this->size];
    }

    public function render()
    {
        return view('components.button');
    }
}
