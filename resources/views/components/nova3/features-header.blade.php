<header class="relative bg-slate-900">
  <div class="px-4 sm:px-6 md:px-8">
    <div class="isolate">
      <svg class="absolute inset-0 -z-10 h-full w-full stroke-white/10 [mask-image:radial-gradient(100%_100%_at_top_right,white,transparent)]" aria-hidden="true">
        <defs>
          <pattern id="983e3e4c-de6d-4c3f-8d64-b9761d1534cc" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
            <path d="M.5 200V.5H200" fill="none" />
          </pattern>
        </defs>
        <svg x="50%" y="-1" class="overflow-visible fill-slate-800/20">
          <path d="M-200 0h201v201h-201Z M600 0h201v201h-201Z M-400 600h201v201h-201Z M200 800h201v201h-201Z" stroke-width="0" />
        </svg>
        <rect width="100%" height="100%" stroke-width="0" fill="url(#983e3e4c-de6d-4c3f-8d64-b9761d1534cc)" />
      </svg>

      <svg viewBox="0 0 1108 632" aria-hidden="true" class="absolute top-10 left-[calc(50%-4rem)] -z-10 w-[69.25rem] max-w-none transform-gpu blur-3xl sm:left-[calc(50%-18rem)] lg:left-48 lg:top-[calc(50%-30rem)] xl:left-[calc(50%-24rem)]">
        <path fill="url(#175c433f-44f6-4d59-93f0-c5c51ad5566d)" fill-opacity=".2" d="M235.233 402.609 57.541 321.573.83 631.05l234.404-228.441 320.018 145.945c-65.036-115.261-134.286-322.756 109.01-230.655C968.382 433.026 1031 651.247 1092.23 459.36c48.98-153.51-34.51-321.107-82.37-385.717L810.952 324.222 648.261.088 235.233 402.609Z" />
        <defs>
          <linearGradient id="175c433f-44f6-4d59-93f0-c5c51ad5566d" x1="1220.59" x2="-85.053" y1="432.766" y2="638.714" gradientUnits="userSpaceOnUse">
            <stop stop-color="#4F46E5" />
            <stop offset="1" stop-color="#80CAFF" />
          </linearGradient>
        </defs>
      </svg>
    </div>

    <x-nav.landing
      :home="route('nova-3')"
      :items="[
        ['href' => route('nova-3-features'), 'title' => 'Features' ],
        ['href' => route('nova-3').'#demo', 'title' => 'Demo' ],
        ['href' => route('docs', '3.0'), 'title' => 'Docs' ],
        ['href' => route('nova-3').'#faq', 'title' => 'FAQs' ],
        ['href' => 'https://discord.gg/7WmKUks', 'title' => 'Discuss' ],
      ]"
      :dark="true"
    />

    <main>
      <div class="relative py-24 sm:py-32 lg:pb-40">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto max-w-2xl text-center">
            <h1 class="mt-4 relative mx-auto max-w-4xl text-4xl font-extrabold tracking-tight text-white sm:text-6xl md:text-7xl">
              Nova 3
              <div class="relative whitespace-nowrap bg-clip-text text-transparent bg-gradient-to-r from-purple-500 to-sky-400">Feature Preview</div>
            </h1>
          </div>

          <div class="mt-10 flex items-center justify-center gap-x-6 dark">
            <x-button :href="route('nova-3')" variant="secondary">
              <span>&larr;</span>
              <span>Back to Nova 3 preview</span>
            </x-button>
          </div>
        </div>

        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]">
          <svg
            class="relative left-[calc(50%+3rem)] h-[21.1875rem] max-w-none -translate-x-1/2 sm:left-[calc(50%+36rem)] sm:h-[42.375rem]"
            viewBox="0 0 1155 678"
          >
            <path fill="url(#ee0717bf-3e43-49df-b1bd-de36422ed3d3)" fill-opacity=".2" d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
            <defs>
              <linearGradient id="ee0717bf-3e43-49df-b1bd-de36422ed3d3" x1="1155.49" x2="-78.208" y1=".177" y2="474.645" gradientUnits="userSpaceOnUse">
                <stop stop-color="#9089FC" />
                <stop offset="1" stop-color="#FF80B5" />
              </linearGradient>
            </defs>
          </svg>
        </div>
      </div>
    </main>
  </div>
</header>