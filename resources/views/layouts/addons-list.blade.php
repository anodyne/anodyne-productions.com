<div>
  <x-header.app
    title="Nova Add-ons"
    :items="[
      ['href' => route('docs'), 'title' => 'Docs' ],
      ['href' => route('addons.index'), 'title' => 'Add-ons' ],
      ['href' => 'https://discord.gg/7WmKUks', 'title' => 'Get Help' ],
    ]"
  ></x-header.app>

  <div class="overflow-hidden">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
      <div class="hidden lg:block fixed z-20 inset-0 top-[3.8125rem] left-[max(0px,calc(50%-45rem))] right-auto w-[19.5rem] pb-10 px-8 overflow-y-auto">
        <nav id="nav" class="lg:text-sm lg:leading-6 relative pt-10">
          {{ $sidebar }}
        </nav>
      </div>

      <div class="relative lg:pl-[19.5rem]">
        <main class="max-w-3xl mx-auto relative z-20 pt-40 md:pt-24 pb-16 xl:max-w-none">
          <x-grid-pattern
            width="72"
            height="56"
            x="-12"
            y="4"
            :squares="[
              [4, 3],
              [2, 1],
              [7, 3],
              [10, 6],
            ]"
          ></x-grid-pattern>

          <header class="mb-16 prose dark:prose-invert">
            <p class="mb-2 text-sm leading-6 font-semibold text-purple-500 dark:text-purple-400">{{ $eyebrow }}</p>
            <h1 class="scroll-mt-24">{{ $title }}</h1>
            <p class="lead">{{ $description }}</p>
          </header>

          <article>
            {{ $slot }}
          </article>
        </main>

        <x-footer.app />
      </div>
    </div>
  </div>
</div>