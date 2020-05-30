<div
    x-data="{ open: false }"
    @click.away="open = false"
    {{ $attributes->merge(['class' => 'relative inline-block text-left']) }}
>
    <div>
        <button @click="open = !open" type="button" class="{{ $triggerStyles }}">
            {{ $slot }}
        </button>
    </div>

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg"
    >
        <div class="py-1 rounded-md bg-white shadow-xs">
            {{ $dropdown }}
        </div>
    </div>
</div>