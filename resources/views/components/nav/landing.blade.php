@props([
  'items' => [],
  'dark' => false,
  'home' => route('home'),
])

<nav @class([
  'relative z-20 pt-6 lg:pt-8 flex items-center justify-between font-semibold text-sm leading-6',
  'text-slate-700' => !$dark,
  'text-white' => $dark,
])>
  <div class="flex items-center md:gap-x-12">
    <a href="{{ $home }}" aria-label="Home">
      <x-logos.nova
        @class([
          'h-9 w-auto',
          'text-slate-700' => !$dark,
          'text-white' => $dark,
        ])
      />
    </a>
    <div class="hidden md:flex items-center">
      <nav>
        <ul class="flex items-center gap-x-8">
          @foreach ($items as $item)
            <li>
              <x-nav.link :href="$item['href']" :dark="$dark">
                {{ $item['title'] }}
              </x-nav.link>
            </li>
          @endforeach
        </ul>
      </nav>
    </div>
  </div>

  <div class="hidden md:flex items-center">
    @auth
      <div x-data x-menu class="relative">
        <x-button x-menu:button variant="secondary" size="xs">
          My Account
        </x-button>

          <div
            x-menu:items
            x-transition.origin.top.right
            class="absolute top-full right-0 mt-3 -mr-0.5 w-60 origin-top-right divide-y divide-slate-100 dark:divide-slate-600/30 rounded-lg bg-white text-sm font-medium text-slate-900 shadow-md ring-1 ring-slate-900/5 focus:outline-none sm:-mr-1.5"
            x-cloak
          >
            <p class="truncate py-3 px-5" role="none">
              <span class="block text-xs text-slate-500" role="none">Signed in as</span>
              <span class="mt-0.5 font-semibold truncate" role="none">{{ auth()->user()->email }}</span>
            </p>
            <div class="p-2">
              <a
                x-menu:item
                href="{{ route('filament.pages.dashboard') }}"
                :class="{
                  'bg-slate-100 text-gray-900': $menuItem.isActive,
                  'text-gray-700': ! $menuItem.isActive,
                }"
                class="block w-full rounded-md py-1.5 px-3 transition-colors"
              >
                Dashboard
              </a>
              <a
                x-menu:item
                href="{{ route('filament.pages.my-profile') }}"
                :class="{
                  'bg-slate-100 text-gray-900': $menuItem.isActive,
                  'text-gray-700': ! $menuItem.isActive,
                }"
                class="block w-full rounded-md py-1.5 px-3 transition-colors"
              >
                My profile
              </a>
            </div>
            <div class="p-2">
              <form action="{{ route('filament.auth.logout') }}" method="post">
                @csrf
                <button
                  type="submit"
                  x-menu:item
                  :class="{
                    'bg-slate-100 text-gray-900': $menuItem.isActive,
                    'text-gray-700': ! $menuItem.isActive,
                  }"
                  class="block w-full text-left rounded-md py-1.5 px-3 transition-colors"
                >
                  Sign out
                </button>
              </form>
            </div>
          </div>
      </div>
    @endauth

    @guest
      <x-button
        :href="route('filament.auth.login')"
        variant="brand"
        size="xs"
      >
        Sign in
      </x-button>
    @endguest
  </div>

  <div class="-mr-1 md:hidden">
    <x-nav.landing-mobile :items="$items" :dark="$dark" />
  </div>
</nav>