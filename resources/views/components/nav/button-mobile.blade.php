@props([
  'dark' => false,
])

<button
  class="flex items-center space-x-3 w-full p-2 font-medium text-slate-700 dark:text-slate-200"
  {{ $attributes->merge(['type' => 'button']) }}
>
  {{ $slot }}
</button>