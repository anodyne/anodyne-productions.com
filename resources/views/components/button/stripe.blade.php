@props([
    'arrow' => false,
    'variant' => 'button', // button, link
    'color' => 'violet', // violet, teal, green, yellow
])

<a {{ $attributes->class([
    'group inline-flex items-center pt-1 pb-1.5 text-[15px] leading-[1.6] whitespace-nowrap transition-all font-medium',
    'rounded-full [corner-shape:squircle] pl-4' => $variant === 'button',
    'pr-3' => $arrow,
    'pr-4' => $variant === 'button' && ! $arrow,
    match ($color) {
        'violet' => match ($variant) {
            'link' => 'text-violet-500 hover:text-slate-800 dark:hover:text-white',
            default => 'bg-violet-500 text-white hover:bg-slate-800 dark:hover:bg-white dark:hover:text-slate-800',
        },
        'teal' => match ($variant) {
            'link' => 'text-teal-500 hover:text-slate-800 dark:hover:text-white',
            default => 'bg-teal-500 text-white hover:bg-slate-800 dark:hover:bg-white dark:hover:text-slate-800',
        },
        'green' => match ($variant) {
            'link' => 'text-green-500 hover:text-slate-800 dark:hover:text-white',
            default => 'bg-green-500 text-white hover:bg-slate-800 dark:hover:bg-white dark:hover:text-slate-800',
        },
        'yellow' => match ($variant) {
            'link' => 'text-yellow-500 hover:text-slate-800 dark:hover:text-white',
            default => 'bg-yellow-500 text-white hover:bg-slate-800 dark:hover:bg-white dark:hover:text-slate-800',
        },
        default => null,
    },
]) }}>
    <span>{{ $slot }}</span>&nbsp;

    @if ($arrow)
        <x-button.arrow />
    @endif
</a>
