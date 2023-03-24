@props([
  'colors' => true,
])

<svg aria-hidden="true" viewBox="0 0 170 170" {{ $attributes }}>
  <x-logos.nova.mark-paths :colors="$colors" />
</svg>