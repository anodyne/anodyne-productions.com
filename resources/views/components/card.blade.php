@props([
    'image' => false,
])

<div class="flex flex-col bg-white dark:bg-slate-800 overflow-hidden shadow dark:shadow-lg rounded-xl ring-1 ring-slate-900/5">
  @if ($image)
    <img src="{{ $image }}" alt="" class="w-full h-auto bg-cover">
  @endif

  <div class="flex-1 w-full px-4 py-5 sm:p-6">
    {{ $slot }}
  </div>

  @isset ($footer)
    <div class="bg-slate-50 dark:bg-slate-900/50 w-full px-4 py-4 sm:px-6">
      {{ $footer }}
    </div>
  @endisset
</div>