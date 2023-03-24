@props([
    'rating',
])

@php($base = floor($rating))
@php($extra = $rating - $base)
@php($leftover = 5 - ceil($rating))

@for ($r = 1; $r <= $base; $r++)
    @svg('fluent-star-filled', 'h-4 w-4 text-amber-400')
@endfor

@if ($extra > 0)
    @svg('fluent-star-half-filled', 'h-4 w-4 text-amber-400')
@endif

@for ($l = 1; $l <= $leftover; $l++)
    @svg('fluent-star', 'h-4 w-4 text-slate-400')
@endfor