@props([
  'dark' => false,
])

<a
  class="flex items-center space-x-3 w-full p-2 font-medium text-slate-700 dark:text-slate-200"
  {{ $attributes }}
>
  {{ $slot }}
</a>