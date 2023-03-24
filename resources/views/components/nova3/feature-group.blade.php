@props([
  'title',
  'content',
  'color',
  'features' => [],
])

<div class="max-w-5xl mx-auto px-8">
  <hr class="border-slate-200/10">
</div>

<div class="py-24 cursor-default">
  <div class="max-w-4xl mx-auto">
    <h2 class="inline-block text-4xl font-bold tracking-tight {{ $color }}">
      {{ $title }}
    </h2>
    <p class="max-w-3xl mt-6 text-lg text-slate-400">{{ $content }}</p>
  </div>

  <div class="mt-12 w-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach ($features as $feature)
      <x-nova3.feature-item
        :title="$feature['title']"
        :content="$feature['content']"
        :image="isset($feature['image']) ? $feature['image'] : null"
      ></x-nova3.feature-item>
    @endforeach
  </div>
</div>