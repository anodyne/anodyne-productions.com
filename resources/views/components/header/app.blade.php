@props([
  'items',
  'title',
  'section',
  'back' => false,
])

<div
  class="fixed top-0 z-40 w-full backdrop-blur-sm dark:backdrop-blur flex-none transition-colors duration-500 lg:z-50 lg:border-b lg:border-slate-900/10 dark:border-slate-50/[0.06] bg-white/[var(--bg-opacity-light)] dark:bg-slate-900/[var(--bg-opacity-dark)]"
  style="--bg-opacity-light:0.5; --bg-opacity-dark:0.2;"
>
  <div class="max-w-8xl mx-auto">
    <div class="py-4 border-b border-slate-900/10 lg:px-8 lg:border-0 dark:border-slate-300/10 mx-4 lg:mx-0">
      <div class="relative flex items-center">
        <div class="flex items-center space-x-3">
          <a class="flex-none w-auto overflow-hidden" href="/">
            <span class="sr-only">Nova home page</span>
            <x-logos.nova class="text-slate-700 dark:text-white w-auto h-8 md:h-7"></x-logos.nova>
          </a>

          {{ $trailingLogo ?? '' }}
        </div>

        <div class="relative hidden lg:flex items-center ml-auto">
          <nav class="text-sm leading-6 font-medium text-slate-700 dark:text-slate-200">
            <ul class="flex space-x-8">
              @foreach ($items as $item)
                <li>
                  <a class="hover:text-purple-500 dark:hover:text-purple-400" href="{{ $item['href'] }}">
                    {{ $item['title'] }}
                  </a>
                </li>
              @endforeach
            </ul>
          </nav>

          <div class="flex items-center border-l border-slate-200 ml-6 pl-6 dark:border-slate-700" x-data="appearanceModeToggle()">
            <x-dropdown placement="bottom-end" class="w-40">
              <x-slot:trigger>
                <span class="dark:hidden">
                  @svg('flex-weather-sun', 'w-5 h-5 text-purple-500')
                </span>
                <span class="hidden dark:inline">
                  @svg('flex-weather-moon', 'w-5 h-5 text-purple-500')
                </span>
              </x-slot:trigger>

              <x-dropdown.group>
                <button
                  type="button"
                  @click="setMode('light');open = false;"
                  class="flex items-center w-full px-3 py-1.5 text-sm transition-colors rounded-md hover:bg-slate-100 dark:hover:bg-slate-700 space-x-2"
                  x-bind:class="{ 'text-purple-500': isLightModeSelected(), 'text-slate-500 dark:text-gray-400': !isLightModeSelected() }"
                >
                  @svg('flex-weather-sun', 'w-5 h-5')
                  <span>Light</span>
                </button>
                <button
                  type="button"
                  @click="setMode('dark');open = false;"
                  class="flex items-center w-full px-3 py-1.5 text-sm transition-colors rounded-md hover:bg-slate-100 dark:hover:bg-slate-700 space-x-2"
                  x-bind:class="{ 'text-purple-500': isDarkModeSelected(), 'text-slate-500 dark:text-gray-400': !isDarkModeSelected() }"
                >
                  @svg('flex-weather-moon', 'w-5 h-5')
                  <span>Dark</span>
                </button>
                <button
                  type="button"
                  @click="setMode();open = false;"
                  class="flex items-center w-full px-3 py-1.5 text-sm transition-colors rounded-md hover:bg-slate-100 dark:hover:bg-slate-700 space-x-2"
                  x-bind:class="{ 'text-purple-500': isSystemModeSelected(), 'text-slate-500 dark:text-gray-400': !isSystemModeSelected() }"
                >
                  @svg('flex-computer', 'w-5 h-5')
                  <span>System</span>
                </button>
              </x-dropdown.group>
            </x-dropdown>

            @auth
              <div class="ml-6">
                <x-dropdown placement="bottom-end" class="w-56">
                  <x-slot:trigger class="text-slate-400 dark:text-slate-500 hover:text-slate-500 dark:hover:text-slate-400">
                    <span class="sr-only">My account</span>
                    @svg('flex-user-square', 'w-5 h-5')
                  </x-slot:trigger>

                  <x-dropdown.group>
                    <div class="px-3 py-1.5 text-sm font-medium">
                      <div class="font-normal text-xs leading-5 text-slate-500 dark:text-slate-400">
                        Signed in as
                      </div>
                      <div class="truncate">
                        {{ auth()->user()->email }}
                      </div>
                    </div>
                  </x-dropdown.group>
                  <x-dropdown.group>
                    <x-dropdown.item :href="route('filament.pages.dashboard')">Dashboard</x-dropdown.item>
                    <x-dropdown.item :href="route('filament.pages.my-profile')">My profile</x-dropdown.item>
                  </x-dropdown.group>
                  <x-dropdown.group>
                    <x-dropdown.item type="submit" form="logout-form">
                      <span>Sign out</span>

                      <x-slot:buttonForm>
                        <x-form :action="route('filament.auth.logout')" class="hidden" id="logout-form" />
                      </x-slot:buttonForm>
                    </x-dropdown.item>
                  </x-dropdown.group>
                </x-dropdown>
              </div>
            @endauth

            @guest
              <a href="{{ route('filament.auth.login') }}" class="ml-6 block text-slate-400 dark:text-slate-500 hover:text-slate-500 dark:hover:text-slate-400">
                <span class="sr-only">Sign in to Anodyne</span>
                @svg('flex-login', 'w-5 h-5')
              </a>
            @endguest
          </div>
        </div>

        @if (config('services.algolia.apiKey'))
          <button type="button" class="ml-auto text-slate-500 w-8 h-8 -my-1 flex items-center justify-center hover:text-slate-600 lg:hidden dark:text-slate-400 dark:hover:text-slate-300">
            <span class="sr-only">Search</span>
            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m19 19-3.5-3.5"></path><circle cx="11" cy="11" r="6"></circle></svg>
          </button>
        @endif

        <div
          @class([
            'ml-auto' => !config('services.algolia.apiKey'),
            'ml-2' => config('services.algolia.apiKey'),
            '-my-1 lg:hidden'
          ])
          x-data="appearanceModeToggle()"
        >
          <x-dropdown class="fixed top-4 right-4 w-full max-w-xs" placement="top" fixed>
            <x-slot:trigger class="text-slate-500 w-8 h-8 flex items-center justify-center hover:text-slate-600 dark:text-slate-400 dark:hover:text-slate-300">
              <span class="sr-only">Navigation</span>
              <svg width="24" height="24" fill="none" aria-hidden="true"><path d="M12 6v.01M12 12v.01M12 18v.01M12 7a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0 6a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0 6a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </x-slot:trigger>

            <div class="p-4">
              <button
                type="button"
                class="absolute top-5 right-5 w-8 h-8 flex items-center justify-center text-slate-500 hover:text-slate-600 dark:text-slate-400 dark:hover:text-slate-300"
                tabindex="0"
                @click="open = false"
              >
                <span class="sr-only">Close navigation</span>
                <svg viewBox="0 0 10 10" class="w-2.5 h-2.5 overflow-visible" aria-hidden="true"><path d="M0 0L10 10M10 0L0 10" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path></svg>
              </button>

              @foreach ($items as $item)
                <x-nav.link-mobile :href="$item['href']">
                  {{ $item['title'] }}
                </x-nav.link-mobile>
              @endforeach

              <hr class="m-2 border-slate-300/40" />

              @auth
                <p class="truncate w-full p-2 font-medium" role="none">
                  <span class="block text-sm text-slate-500" role="none">Signed in as</span>
                  <span class="mt-0.5 font-semibold" role="none">{{ auth()->user()->email }}</span>
                </p>
                <x-nav.link-mobile :href="route('filament.pages.dashboard')">
                  Dashboard
                </x-nav.link-mobile>
                <x-nav.link-mobile :href="route('filament.pages.my-profile')">
                  My profile
                </x-nav.link-mobile>
                <form action="{{ route('filament.auth.logout') }}" method="post">
                  @csrf
                  <x-nav.button-mobile type="submit">
                    Sign out
                  </x-nav.button-mobile>
                </form>
              @endauth

              @guest
                <x-nav.link-mobile :href="route('filament.auth.login')">
                  Sign in
                </x-nav.link-mobile>
              @endguest
            </div>

            <div class="p-6 bg-slate-50 dark:bg-slate-900/50 border-t border-slate-900/5 overflow-hidden">
              <div class="flex items-center justify-between">
                <label for="theme" class="text-slate-700 font-normal dark:text-slate-400">Switch theme</label>
                <div class="relative flex items-center ring-1 ring-slate-900/10 rounded-lg shadow-sm p-2 text-slate-700 font-semibold bg-white dark:bg-slate-600 dark:ring-0 dark:highlight-white/5 dark:text-slate-200">
                  @svg('flex-weather-sun', 'w-5 h-5 mr-2 dark:hidden')
                  @svg('flex-weather-moon', 'w-5 h-5 mr-2 hidden dark:block')

                  <span class="dark:hidden">Light</span>
                  <span class="hidden dark:block">Dark</span>

                  <svg class="w-6 h-6 ml-2 text-slate-400" fill="none"><path d="m15 11-3 3-3-3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>

                  <select id="theme" class="absolute appearance-none inset-0 w-full h-full opacity-0" @change="setMode($event.target.value)">
                    <option value="light" :selected="isLightModeSelected()">Light</option>
                    <option value="dark" :selected="isDarkModeSelected()">Dark</option>
                    <option value="system" :selected="isSystemModeSelected()">System</option>
                  </select>
                </div>
              </div>
            </div>
          </x-dropdown>
        </div>
      </div>
    </div>

    <div class="flex items-center p-4 border-b border-slate-900/10 lg:hidden dark:border-slate-50/[0.06] gap-x-4">
      @if ($back)
        <a href="{{ $back }}" class="text-slate-500 hover:text-slate-600 dark:text-slate-400 dark:hover:text-slate-300">
          <span class="sr-only">Back</span>
          <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" /></svg>
        </a>
      @endif

      @isset($sidebar)
        <button type="button" class="text-slate-500 hover:text-slate-600 dark:text-slate-400 dark:hover:text-slate-300">
          <span class="sr-only">Navigation</span>
          <svg width="24" height="24"><path d="M5 6h14M5 12h14M5 18h14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path></svg>
        </button>
      @endisset

      <ol class="flex text-sm leading-6 whitespace-nowrap min-w-0">
        @isset($section)
          <li class="flex items-center text-slate-600 dark:text-slate-400">
            {{ $section }}
            <svg width="3" height="6" aria-hidden="true" class="mx-3 overflow-visible text-slate-400"><path d="M0 0L3 3L0 6" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path></svg>
          </li>
        @endisset

        <li class="font-semibold text-slate-900 truncate dark:text-slate-200">{{ $title }}</li>
      </ol>
    </div>
  </div>
</div>