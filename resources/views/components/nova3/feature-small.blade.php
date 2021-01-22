@props([
    'icon',
    'title',
    'titleColor' => 'white',
    'bodyColor' => 'gray-700',
])

<div>
    <div>
        <span class="squircle flex items-center justify-center h-12 w-12 bg-white bg-opacity-10">
            @svg($icon, 'h-7 w-7 text-'.$titleColor)
        </span>
    </div>
    <div class="mt-6">
        <h3 class="text-lg font-medium text-{{ $titleColor }}">{{ $title }}</h3>
        <p class="mt-2 text-base text-{{ $bodyColor }}">
            {{ $slot }}
        </p>
    </div>
</div>