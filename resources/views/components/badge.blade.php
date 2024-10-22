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
    'inline-flex items-center rounded-full font-medium ring-1 ring-inset leading-loose',
    'space-x-1.5' => !$group,
    'space-x-3' => $group,
    'px-2.5 text-xs' => $size === 'xs' && !$group,
    'px-2.5 py-0.5 text-xs' => $size === 'sm' && !$group,
    'px-3 py-0.5 text-sm' => $size === 'md' && !$group,
    'px-3.5 py-1 text-sm' => $size === 'lg' && !$group,
    'px-4 py-1 text-sm' => $group,
    match ($color) {
        'danger' => 'bg-danger-50 text-danger-700 ring-danger-200 dark:bg-danger-950 dark:text-danger-300 dark:ring-danger-800',
        'info' => 'bg-info-50 text-info-700 ring-info-200 dark:bg-info-950 dark:text-info-300 dark:ring-info-800',
        'primary' => 'bg-primary-50 text-primary-700 ring-primary-200 dark:bg-primary-950 dark:text-primary-300 dark:ring-primary-800',
        'success' => 'bg-success-50 text-success-700 ring-success-200 dark:bg-success-950 dark:text-success-300 dark:ring-success-800',
        'warning' => 'bg-warning-50 text-warning-700 ring-warning-200 dark:bg-warning-950 dark:text-warning-300 dark:ring-warning-800',
        default => 'bg-slate-50 text-slate-700 ring-slate-200 dark:bg-slate-900 dark:text-slate-300 dark:ring-slate-700',
    }
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