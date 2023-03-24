@props([
    'leadingAddOn' => false,
    'trailingAddOn' => false,
])

@aware(['error'])

<div
    @class([
        'ring-slate-300 focus-within:ring-purple-400 dark:ring-slate-200/[15%] dark:focus-within:ring-purple-700' => !$error,
        'ring-danger-400 dark:ring-danger-600 focus-within:ring-danger-400 dark:focus-within:ring-danger-600' => $error,
        'group relative flex items-center relative w-full rounded-md py-2 px-3 bg-white dark:bg-slate-700/50 dark:focus-within:bg-slate-800 shadow-sm transition space-x-2 ring-1 focus-within:ring-2'
    ])
    {{ $attributes }}
>
    @if ($leadingAddOn)
        <div class="flex items-center shrink-0 text-slate-500 dark:text-slate-400 sm:text-sm">
            {{ $leadingAddOn }}
        </div>
    @endif

    {{ $slot }}

    @if ($trailingAddOn || $error)
        <div
            @class([
                'text-danger-500' => $error,
                'text-slate-400' => !$error,
                'flex items-center shrink-0 dark:text-slate-500 sm:text-sm'
            ])
        >
            @if ($error)
                @svg('flex-alert-diamond', 'h-5 w-5 shrink-0')
            @else
                {{ $trailingAddOn }}
            @endif
        </div>
    @endif
</div>
