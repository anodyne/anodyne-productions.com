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
    'inline-flex items-center rounded-full font-medium ring-[1.5px] ring-inset leading-loose',
    'space-x-1.5' => !$group,
    'space-x-3' => $group,
    'px-2.5 text-xs' => $size === 'xs' && !$group,
    'px-2.5 py-0.5 text-xs' => $size === 'sm' && !$group,
    'px-3 py-0.5 text-sm' => $size === 'md' && !$group,
    'px-3.5 py-1 text-sm' => $size === 'lg' && !$group,
    'px-4 py-1 text-sm' => $group,

    'bg-slate-50 dark:bg-slate-400/10 text-slate-600 dark:text-slate-400 ring-slate-500/10 dark:ring-slate-400/20' => $color === 'gray',
    'bg-purple-50 dark:bg-purple-400/10 text-purple-600 dark:text-purple-400 ring-purple-500/10 dark:ring-purple-400/20' => $color === 'purple',
    'bg-emerald-50 dark:bg-emerald-400/10 text-emerald-600 dark:text-emerald-400 ring-emerald-500/10 dark:ring-emerald-400/20' => $color === 'emerald',
    'bg-amber-50 dark:bg-amber-400/10 text-amber-600 dark:text-amber-400 ring-amber-500/10 dark:ring-amber-400/20' => $color === 'amber',
    'bg-sky-50 dark:bg-sky-400/10 text-sky-600 dark:text-sky-400 ring-sky-500/10 dark:ring-sky-400/20' => $color === 'sky',
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