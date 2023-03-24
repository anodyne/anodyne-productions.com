@props([
  'title',
  'content',
  'image' => null,
])

<div class="bg-slate-800 rounded-lg border border-white/10 ring-4 ring-white ring-opacity-5 overflow-hidden">
  {{-- <div class="aspect-w-2 aspect-h-1">
    <img src="{{ asset($image ?? '/images/nova3-features/feeds.png') }}" alt="">
  </div> --}}
  <div class="p-4">
    <h3 class="text-lg font-semibold text-white">{{ $title }}</h3>
    <p class="mt-2">{{ $content }}</p>
  </div>
</div>