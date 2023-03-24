@props([
    'type' => 'link',
    'icon' => false,
    'buttonForm' => false,
])

@if ($type === 'link')
    <a {{ $attributes->merge(['href' => '#', 'class' => 'group flex items-center w-full px-3 py-1.5 text-sm rounded font-medium text-slate-700 transition ease-in-out duration-150 hover:bg-slate-100 dark:hover:bg-slate-700 focus:outline-none focus:bg-slate-100 focus:text-slate-900']) }} role="menuitem">
        @if ($icon)
            @svg($icon, 'shrink-0 mr-2 h-5 w-5 text-slate-400 group-hover:text-slate-500 group-focus:text-slate-500')
        @endif

        {{ $slot }}
    </a>
@elseif ($type === 'button' || $type === 'submit')
    <button {{ $attributes->merge(['type' => 'button', 'class' => 'group rounded-md flex items-center w-full px-3 py-1.5 text-base md:text-sm font-medium transition text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-700 focus:outline-none']) }} role="menuitem">
        @if ($icon)
            @svg($icon, 'shrink-0 mr-2 h-5 w-5 text-slate-400 group-hover:text-slate-500 group-focus:text-slate-500')
        @endif

        {{ $slot }}
    </button>

    @if ($buttonForm)
        {{ $buttonForm }}
    @endif
@endif