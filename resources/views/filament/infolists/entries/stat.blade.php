@use('Illuminate\Support\Number')

@php
    $tooltip = $getTooltip();
@endphp

<div
    class="mx-auto flex flex-col gap-y-4"
    @if (filled($tooltip))
        x-data="{}"
        x-tooltip="{
            content: @js($tooltip),
            theme: $store.theme,
        }"
    @endif
>
    <div class="text-base/7 text-gray-600 dark:text-gray-400">
        {{ $getLabel() }}
    </div>
    <div
        class="order-first text-3xl font-semibold tracking-tight text-gray-900 dark:text-white sm:text-5xl tabular-nums"
    >
        @if (is_string($getState()))
            {{ $getState() }}
        @else
            @if (isset($short) && $short === true)
                {{ Number::abbreviate($getState(), 0) }}
            @else
                {{ Number::format($getState() ?? 0) }}
            @endif
        @endif
    </div>
</div>