@props([
    'title',
    'text',
    'icon',
])

<div class="relative flex flex-col space-y-4">
    <span class="squircle flex items-center justify-center h-16 w-16 bg-gradient-to-r from-orange-500 to-amber-500 text-white">
        @svg($icon, 'h-9 w-9')
    </span>
    <div class="space-y-2">
        <dt class="text-xl font-semibold text-gray-900">
            {{ $title }}
        </dt>
        <dd class="text-gray-600 leading-7">
            {{ $text }}
        </dd>
    </div>
</div>