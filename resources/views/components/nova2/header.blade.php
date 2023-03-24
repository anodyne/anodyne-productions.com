<header class="relative">
  <div class="px-4 sm:px-6 md:px-8">
    <div class="isolate bg-slate-50 z-10">
      <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]">
        <svg class="relative left-[calc(50%-11rem)] -z-10 h-[21.1875rem] max-w-none -translate-x-1/2 rotate-[30deg] sm:left-[calc(50%-30rem)] sm:h-[42.375rem]" viewBox="0 0 1155 678" xmlns="http://www.w3.org/2000/svg">
            <path fill="url(#45de2b6b-92d5-4d68-a6a0-9b9b2abad533)" fill-opacity=".3" d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
            <defs>
              <linearGradient id="45de2b6b-92d5-4d68-a6a0-9b9b2abad533" x1="1155.49" x2="-78.208" y1=".177" y2="474.645" gradientUnits="userSpaceOnUse">
                <stop stop-color="#9089FC" />
                <stop offset="1" stop-color="#FF80B5" />
              </linearGradient>
            </defs>
        </svg>
      </div>

      <svg class="absolute inset-0 -z-10 h-full w-full stroke-purple-700/15 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]" aria-hidden="true">
        <defs>
          <pattern id="983e3e4c-de6d-4c3f-8d64-b9761d1534cc" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
            <path d="M.5 200V.5H200" fill="none" />
          </pattern>
        </defs>

        <svg x="50%" y="-1" class="overflow-visible fill-purple-200/20">
          <path d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z" stroke-width="0" />
        </svg>
        <rect width="100%" height="100%" stroke-width="0" fill="url(#983e3e4c-de6d-4c3f-8d64-b9761d1534cc)" />
      </svg>
    </div>

    <x-nav.landing
      :items="[
        ['href' => '#features', 'title' => 'Features' ],
        ['href' => '#download', 'title' => 'Download' ],
        ['href' => '#resources', 'title' => 'Resources' ],
        ['href' => route('docs'), 'title' => 'Docs' ],
        ['href' => route('addons.index'), 'title' => 'Add-ons' ],
        ['href' => 'https://discord.gg/7WmKUks', 'title' => 'Get Help' ],
      ]"
      :dark="false"
    />

    <div class="relative px-6 lg:px-8">
      <div class="mx-auto max-w-4xl py-32 sm:py-48 lg:py-56">
        <div class="hidden sm:mb-8 sm:flex sm:justify-center">
          <a href="{{ route('nova-3') }}" class="group inline-flex items-center rounded-full font-medium space-x-3 px-3.5 py-0.5 bg-purple-200/60 text-purple-700 text-sm hover:bg-purple-200 hover:text-purple-800 transition">
            <div class="shrink-0 inline-flex items-center -ml-2.5">
              <div class="inline-flex items-center bg-purple-50 rounded-full px-2.5">Nova 3</div>
            </div>
            <span class="inline-flex items-center">Explore Nova&rsquo;s next generation <span class="text-base ml-1.5 text-purple-500 group-hover:text-purple-700 font-semibold transition">&rarr;</span></span>
          </a>
        </div>

        <div class="text-center">
          <h1 class="mt-4 relative mx-auto max-w-4xl text-4xl font-extrabold tracking-tight text-slate-700 sm:text-6xl md:text-7xl">
            <span class="before:block before:absolute before:rounded-xl before:-inset-1 before:-skew-y-3 before:bg-gradient-to-r before:from-purple-500 before:to-sky-400 relative inline-block px-2 py-1.5">
              <span class="relative text-white">Painless</span>
            </span>
            <span class="relative whitespace-nowrap">RPG management</span>
          </h1>

          <p class="mt-6 mx-auto max-w-2xl text-lg leading-8 text-slate-600">
            With an easy-to-use interface, integrated posting system, a wide array of developer tools and much more, Nova is all you need to stop managing your game and get back to playing it.
          </p>

          <div class="mt-10 flex flex-col md:flex-row items-center justify-center gap-y-6 md:gap-y-0 md:gap-x-6">
            <x-button href="#download" variant="brand" size="md">
              <span>Download now</span>
            </x-button>
            <x-button href="#features" variant="secondary">
              <span>Learn more</span>
              <span>&rarr;</span>
            </x-button>
          </div>
        </div>
      </div>

      <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]">
        <svg class="relative left-[calc(50%+3rem)] h-[21.1875rem] max-w-none -translate-x-1/2 sm:left-[calc(50%+36rem)] sm:h-[42.375rem]" viewBox="0 0 1155 678" xmlns="http://www.w3.org/2000/svg">
          <path fill="url(#ecb5b0c9-546c-4772-8c71-4d3f06d544bc)" fill-opacity=".3" d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
          <defs>
            <linearGradient id="ecb5b0c9-546c-4772-8c71-4d3f06d544bc" x1="1155.49" x2="-78.208" y1=".177" y2="474.645" gradientUnits="userSpaceOnUse">
              <stop stop-color="#9089FC" />
              <stop offset="1" stop-color="#FF80B5" />
            </linearGradient>
          </defs>
        </svg>
      </div>
    </div>
  </div>
</header>