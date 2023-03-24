@props([
  'dark' => false,
])

<a {{ $attributes }} @class([
  'transition',
  'hover:text-purple-600' => !$dark,
  'hover:text-purple-400' => $dark,
])>
  {{ $slot }}
</a>