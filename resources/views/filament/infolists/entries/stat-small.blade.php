@use('Illuminate\Support\Number')

<div class="mx-auto flex flex-col gap-y-2">
    <div class="text-sm/6 text-gray-600 dark:text-gray-400">
        {{ $getLabel() }}
    </div>
    <div
        class="order-first text-xl font-semibold tracking-tight text-gray-900 dark:text-white sm:text-3xl"
    >
        @if (is_string($getState())) {{ $getState() }} @else @if (isset($short)
        && $short === true) {{ Number::abbreviate($getState(), 0) }} @else {{
        Number::format($getState() ?? 0) }} @endif @endif
    </div>
</div>
