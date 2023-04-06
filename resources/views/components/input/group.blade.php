@props([
    'label' => false,
    'for' => false,
    'help' => false,
    'error' => false,
])

<div {{ $attributes->merge(['class' => $error ? 'has-error' : '']) }}>
    @if ($label)
        <label for="{{ $for }}" class="block mb-1 text-sm font-medium text-slate-700 dark:text-slate-300">
            {{ $label }}
        </label>
    @endif

    {{ $slot }}

    @if ($error)
        <p class="flex items-center w-full relative mt-2 ml-0.5 text-base md:text-sm text-rose-500 space-x-1 font-medium" role="alert">
            <span>{{ $error }}</span>
        </p>
    @endif

    @if ($help)
        <p class="block w-full relative mt-2 ml-0.5 text-base md:text-sm text-slate-500 dark:text-slate-400" role="note">
            {{ $help }}
        </p>
    @endif
</div>
