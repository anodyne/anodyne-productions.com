@php
  $resources = [
    [
      'title' => 'Learn all about Nova',
      'category' => 'Documentation',
      'cta' => 'Read more',
      'url' => route('docs'),
      'content' => "Nova's documentation has been re-written to be clearer and more helpful. We've added all-new sections about getting started, added pages to explain complex features, and dug deeper into the core of Nova to help users understand how to get the most out Nova.",
    ],
    [
      'title' => 'Join the community',
      'category' => 'Community',
      'cta' => 'Join now',
      'url' => 'https://discord.gg/7WmKUks',
      'content' => "Over the years Nova has fostered a global community of artists, developers, and writers who are passionate about the stories they tell. No matter if you're looking to chat with people, find a new game, or get help with Nova, the Anodyne community is ready to welcome you.",
    ],
    [
      'title' => 'Make Nova your own',
      'category' => 'Add-ons',
      'cta' => 'Explore add-ons',
      'url' => route('addons.index'),
      'content' => "Nova provides the flexibility to make your game stand out from others. Whether you're trying to change the way it looks with a theme or rank set or even update how it works with an extension, the community's talented add-on authors here have you covered.",
    ],
  ];
@endphp

<a name="resources"></a>
<section id="resources" aria-label="Resources" class="bg-slate-50 py-20 sm:py-32">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="md:text-center">
      <h2 class="font-bold text-3xl tracking-tight text-slate-900 sm:text-4xl">
        <span class="relative whitespace-nowrap">Helpful resources</span>
      </h2>
    </div>

    <ul
      role="list"
      class="grid grid-cols-1 gap-x-12 gap-y-16 sm:grid-cols-2 lg:grid-cols-3 mt-16"
    >
      @foreach ($resources as $resource)
        <article class="group relative flex flex-col items-start">
          <h3 class="font-semibold text-xl text-slate-800">
            <div class="absolute -inset-y-6 -inset-x-4 z-0 scale-95 bg-slate-100 opacity-0 transition group-hover:scale-100 group-hover:opacity-100 sm:-inset-x-6 sm:rounded-2xl"></div>
            <a href="{{ $resource['url'] }}">
              <span class="absolute -inset-y-6 -inset-x-4 z-20 sm:-inset-x-6 sm:rounded-2xl"></span>
              <span class="relative z-10">{{ $resource['title'] }}</span>
            </a>
          </h3>

          <p class="relative z-10 order-first mb-1 flex items-center text-sm font-medium text-slate-500">
            <span>{{ $resource['category'] }}</span>
          </p>

          <p class="relative z-10 mt-2 text-sm leading-6 text-slate-600">
            {{ $resource['content'] }}
          </p>

          <div class="relative z-10 mt-4 flex items-center text-sm font-medium text-purple-500 group-hover:text-purple-600 dark:group-hover:text-purple-400 transition">
            {{ $resource['cta'] }}
            <span class="ml-1.5">&rarr;</span>
          </div>
        </article>
      @endforeach
    </ul>
  </div>
</section>