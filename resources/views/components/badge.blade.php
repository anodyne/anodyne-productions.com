@props([
    'color',
    'size' => 'base',
])

@dd($getState())

<span class="inline-flex items-center py-0.5 rounded-full font-medium bg-{{ $color }}-200 text-{{ $color }}-800 {{ $size === 'sm' ? 'px-2.5 text-xs' : 'px-3 text-sm' }}">
    {{ $slot }}
</span>