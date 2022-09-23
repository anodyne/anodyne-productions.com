@props([
    'placement' => 'bottom-start',
    'triggerColor' => 'dark-gray-text',
    'triggerSize' => 'none',
    'width' => 'w-56',
])

<div
    x-data="{ open: false }"
    x-on:keydown.window.escape="open = false"
    x-on:click.away="open = false"
    x-on:dropdown-toggle="open = !open"
    x-on:dropdown-close.window="open = false"
    class="relative inline-block text-left leading-0 w-full"
>
    <div>
        <x-button
            x-on:click="open = !open"
            type="button"
            :color="$triggerColor"
            :size="$triggerSize"
            aria-haspopup="true"
            aria-expanded="true"
            x-bind:aria-expanded="open"
        >
            {{ $trigger }}
        </x-button>
    </div>

    <div
        x-show="open"
        x-description="Dropdown panel, show/hide based on dropdown state."
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute mt-2 rounded-lg shadow-lg z-9999 {{ $width }} {{ $placement === 'bottom-start' ? 'left-0 origin-top-left' : 'right-0 origin-top-right' }}"
        x-cloak
    >
        <div class="relative rounded-lg bg-white ring-1 ring-black ring-opacity-5 z-50 divide-y divide-gray-100">
            {{ $slot }}
        </div>
    </div>
</div>
