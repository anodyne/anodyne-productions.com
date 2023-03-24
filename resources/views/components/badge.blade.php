@props([
    'color' => 'gray',
    'fill' => 'none',
    'size' => 'md',
    'leading' => false,
    'trailing' => false,
    'group' => false,
    'border' => false,
])

<span @class([
    'inline-flex items-center rounded-full font-medium ring-[1.5px]',
    'space-x-1.5' => !$group,
    'space-x-3' => $group,
    'px-2 text-xs' => $size === 'xs' && !$group,
    'px-2 py-0.5 text-xs' => $size === 'sm' && !$group,
    'px-2.5 py-0.5 text-sm' => $size === 'md' && !$group,
    'px-3 py-1 text-sm' => $size === 'lg' && !$group,
    'px-3.5 py-1 text-sm' => $group,

    'ring-slate-300 dark:ring-slate-700 text-slate-600 dark:text-slate-400' => $color === 'gray',
    'ring-purple-300 dark:ring-purple-700 text-purple-600 dark:text-purple-400' => $color === 'purple',
    'ring-emerald-300 dark:ring-emerald-700 text-emerald-600 dark:text-emerald-400' => $color === 'emerald',
    'ring-amber-300 dark:ring-amber-800 text-amber-600 dark:text-amber-500' => $color === 'amber',

    'bg-white dark:bg-slate-900' => $fill === 'neutral',
])>
    @if ($leading)
        <div class="shrink-0">
            <div @class([
                '-ml-2.5' => $group,
            ])>
                {{ $leading }}
            </div>
        </div>
    @endif

    <span>{{ $slot }}</span>

    @if ($trailing)
        <div class="shrink-0">
            <div @class([
                '-mr-2.5' => $group,
            ])>
                {{ $trailing }}
            </div>
        </div>
    @endif
</span>