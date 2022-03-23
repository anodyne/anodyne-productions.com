@props([
    'question',
    'index',
])

<div class="pt-6">
    <dt class="text-lg">
        <button x-description="Expand/collapse question button" @click="openPanel = (openPanel === {{ $index }} ? null : {{ $index }})" class="text-left w-full flex justify-between items-start text-gray-500 focus:outline-none" x-bind:aria-expanded="openPanel === {{ $index }}">
            <span class="font-medium text-gray-100">
                {{ $question }}
            </span>
            <span class="ml-6 h-7 flex items-center">
                <svg class="h-6 w-6 rotate-0" x-description="Heroicon name: chevron-down" x-state:on="Open" x-state:off="Closed" x-bind:class="{ '-rotate-180': openPanel === {{ $index }}, 'rotate-0': !(openPanel === {{ $index }}) }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </span>
        </button>
    </dt>
    <dd class="mt-2 pr-12" x-show="openPanel === {{ $index }}" style="display: none;">
        <p class="text-base text-gray-400 leading-7">
            {{ $slot }}
        </p>
    </dd>
</div>