<div>
  <x-header.app
    :title="$title"
    :back="route('addons.index')"
    :items="[
      ['href' => route('docs'), 'title' => 'Docs' ],
      ['href' => route('addons.index'), 'title' => 'Add-ons' ],
      ['href' => 'https://discord.gg/7WmKUks', 'title' => 'Get Help' ],
    ]"
  ></x-header.app>

  <div class="overflow-hidden">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
      <div class="relative">
        <main class="max-w-3xl mx-auto relative z-20 pt-40 md:pt-24 pb-16 lg:max-w-none">
          <article>
            {{ $slot }}
          </article>
        </main>

        <x-footer.app wide />
      </div>
    </div>
  </div>
</div>