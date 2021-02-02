@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-white text-sm font-medium rounded-lg bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10'
            : 'text-gray-400 text-sm font-medium rounded-lg bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
