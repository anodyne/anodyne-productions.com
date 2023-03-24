@props([
  'dark' => false,
])

<a
  class="flex items-center space-x-3 w-full p-2 font-medium"
  {{ $attributes }}
>
  {{ $slot }}
</a>