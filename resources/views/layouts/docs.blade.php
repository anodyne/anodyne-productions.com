<x-base-layout>
    <div class="font-sans antialiased" x-data="{ sidebarOpen: false }" @keydown.window.escape="sidebarOpen = false">
        <header class="sticky top-0 z-30 mx-auto bg-opacity-50 h-[72px] bg-gray-100 backdrop-blur max-w-8xl xl:px-8">
            <div class="flex items-center justify-between px-4 py-5 border-b lg:px-8 sm:px-6 xl:px-0 border-gray-200">
                <a href="{{ route('home') }}" class="block">
                    <x-logos.anodyne class="h-8 w-auto" gradient />
                </a>
            </div>
        </header>

        <button class="transition fixed z-40 flex items-center justify-center w-16 h-16 text-white bg-spanish-roast rounded-full bottom-4 right-4 lg:hidden focus:outline-none focus-visible:ring bg-opacity-60 backdrop-blur" @click.stop="sidebarOpen = !sidebarOpen">
            <span class="sr-only" x-show="!sidebarOpen">Open site navigation</span>
            <span class="sr-only" x-show="sidebarOpen" x-cloak>Close site navigation</span>
            <svg width="24" height="24" fill="none" class="" x-show="!sidebarOpen"><path d="M4 8h16M4 16h16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            <svg width="24" height="24" fill="none" class="" x-show="sidebarOpen" x-cloak><path d="M6 18L18 6M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
        </button>

        <div x-show="sidebarOpen" class="md:hidden" x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state." x-cloak>
            <div class="fixed inset-0 z-30 flex">
                <div @click="sidebarOpen = false" x-show="sidebarOpen" x-description="Off-canvas menu overlay, show/hide based on off-canvas menu state." x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0" aria-hidden="true">
                    <div class="bg-gray-900 absolute inset-0 backdrop-blur bg-opacity-50"></div>
                </div>

                <div x-show="sidebarOpen" x-description="Off-canvas menu, show/hide based on off-canvas menu state." x-transition:enter="transition ease-in-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="relative max-w-xs w-full bg-gray-100 pt-5 pb-4 flex-1 flex flex-col" style="display: none;">
                    <div class="shrink-0 px-4 flex items-center">
                        <a href="{{ route('home') }}" class="block">
                            <x-logos.anodyne class="h-8 w-auto" gradient />
                        </a>
                    </div>
                    <div class="mt-5 flex-1 h-0 overflow-y-auto">
                        <nav class="px-2 space-y-8 font-medium text-base lg:text-sm">
                            <ul>
                                <li>
                                    <a
                                        href="{{ route('docs') }}"
                                        class="group px-3 py-2 transition ease-in-out duration-200 relative flex items-center hover:text-amber-500 text-gray-500"
                                        aria-current="page"
                                    >
                                        <div class="group relative flex items-center space-x-3">
                                            @svg('fluent-class', 'shrink-0 h-6 w-6 text-gray-400 group-hover:text-amber-500 transition ease-in-out duration-150')

                                            <span class="truncate">
                                                Docs
                                            </span>
                                        </div>
                                    </a>
                                </li>

                                @if (config('services.anodyne.exchange'))
                                    <li>
                                        <a
                                            href="{{ route('exchange.index') }}"
                                            class="group px-3 py-2 transition-colors duration-200 relative flex items-center hover:text-amber-500 text-gray-500"
                                            aria-current="page"
                                        >
                                            <div class="group relative flex items-center space-x-3">
                                                @svg('fluent-apps-add-in', 'shrink-0 h-6 w-6 text-gray-400 group-hover:text-amber-500 transition ease-in-out duration-150')

                                                <span class="truncate">
                                                    Exchange
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a
                                            href="https://xtras.anodyne-productions.com"
                                            target="_blank"
                                            class="group px-3 py-2 transition-colors duration-200 relative flex items-center hover:text-amber-500 text-gray-500"
                                            aria-current="page"
                                        >
                                            <div class="group relative flex items-center space-x-3">
                                                @svg('fluent-apps-add-in', 'shrink-0 h-6 w-6 text-gray-400 group-hover:text-amber-500 transition ease-in-out duration-150')

                                                <span class="truncate">
                                                    AnodyneXtras
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                @endif

                                @if (config('services.anodyne.galaxy'))
                                    <li>
                                        <a
                                            href="{{ route('galaxy.index') }}"
                                            class="group px-3 py-2 transition-colors duration-200 relative flex items-center hover:text-amber-500 text-gray-500"
                                            aria-current="page"
                                        >
                                            <div class="group relative flex items-center space-x-3">
                                                @svg('fluent-rocket', 'shrink-0 h-6 w-6 text-gray-400 group-hover:text-amber-500 transition ease-in-out duration-150')

                                                <span class="truncate">
                                                    Galaxy
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                @endif

                                <li>
                                    <a
                                        href="https://discord.gg/7WmKUks"
                                        target="_blank"
                                        class="group px-3 py-2 transition-colors duration-200 relative flex items-center hover:text-amber-500 text-gray-500"
                                        aria-current="page"
                                    >
                                        <div class="group relative flex items-center space-x-3">
                                            @svg('fluent-chat-bubbles-help', 'shrink-0 h-6 w-6 text-gray-400 group-hover:text-amber-500 transition ease-in-out duration-150')

                                            <span class="truncate">
                                                Get Help
                                            </span>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                            @if (count(config('services.anodyne.docs-versions')) > 1)
                                <div>
                                    <ul>
                                        @foreach (config('services.anodyne.docs-versions') as $ver)
                                            <li>
                                                <a
                                                    href="{{ route('docs', $ver) }}"
                                                    class="group px-3 py-2 transition ease-in-out duration-200 relative flex items-center hover:text-amber-500 text-gray-500"
                                                    aria-current="page"
                                                >
                                                    <div class="group relative flex items-center space-x-3">
                                                        <span class="truncate">
                                                            Nova {{ $ver }}
                                                        </span>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @foreach ($sections as $section)
                                <div>
                                    @isset($section['title'])
                                        <h5 class="px-3 mb-3 lg:mb-3 uppercase tracking-wide font-semibold text-sm lg:text-xs text-gray-900">
                                            {{ $section['title'] }}
                                        </h5>
                                    @endisset

                                    <ul>
                                        @foreach ($section['pages'] as $page)
                                            @php($slug = $page['file'] ?? $page)
                                            <li>
                                                <a
                                                    href="{{ $page['link'] ?? route('docs', [$version, $slug]) }}"
                                                    @isset($page['link']) target="_blank" @endisset
                                                    class="group px-3 py-2 transition-colors duration-200 relative flex items-center {{ $current === $slug ? 'text-amber-600' : 'hover:text-gray-900 text-gray-500' }}"
                                                    aria-current="page"
                                                >
                                                    <span class="rounded-lg absolute inset-0 bg-amber-50 z-0 {{ $current === $slug ? 'opacity-100' : 'opacity-0' }}"></span>

                                                    <div class="group relative flex items-center">
                                                        @isset($page['icon'])
                                                            @svg($page['icon'], 'shrink-0 -ml-1 mr-3 h-6 w-6 text-gray-500 group-hover:text-gray-600 transition ease-in-out duration-150')
                                                        @endisset

                                                        <span class="truncate">
                                                            {{ $page['name'] ?? str_replace('-', ' ', Illuminate\Support\Str::title($slug)) }}
                                                        </span>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </nav>
                    </div>
                </div>
                <div class="shrink-0 w-14">
                    <!-- Dummy element to force sidebar to shrink to fit close icon -->
                </div>
            </div>
        </div>

        <div class="flex px-4 mx-auto max-w-8xl sm:px-6 lg:px-8">
            <div class="shrink-0 hidden w-64 lg:block lg:pr-8 lg:pt-12">
                <nav
                    class="mx-auto font-medium text-base lg:text-sm space-y-8 text-gray-600 mb-8"
                    x-data="{ selected: $persist(1).as('nova-{{ $version }}').using(sessionStorage) }"
                >
                    <ul>
                        <li>
                            <a
                                href="{{ route('docs') }}"
                                class="group px-3 py-2 transition ease-in-out duration-200 relative flex items-center hover:text-amber-500 text-gray-500"
                                aria-current="page"
                            >
                                <div class="group relative flex items-center space-x-3">
                                    @svg('fluent-class', 'shrink-0 h-6 w-6 text-gray-400 group-hover:text-amber-500 transition ease-in-out duration-150')

                                    <span class="truncate">
                                        Docs
                                    </span>
                                </div>
                            </a>
                        </li>

                        @if (config('services.anodyne.exchange'))
                            <li>
                                <a
                                    href="{{ route('exchange.index') }}"
                                    class="group px-3 py-2 transition-colors duration-200 relative flex items-center hover:text-amber-500 text-gray-500"
                                    aria-current="page"
                                >
                                    <div class="group relative flex items-center space-x-3">
                                        @svg('fluent-apps-add-in', 'shrink-0 h-6 w-6 text-gray-400 group-hover:text-amber-500 transition ease-in-out duration-150')

                                        <span class="truncate">
                                            Exchange
                                        </span>
                                    </div>
                                </a>
                            </li>
                        @else
                            <li>
                                <a
                                    href="https://xtras.anodyne-productions.com"
                                    target="_blank"
                                    class="group px-3 py-2 transition-colors duration-200 relative flex items-center hover:text-amber-500 text-gray-500"
                                    aria-current="page"
                                >
                                    <div class="group relative flex items-center space-x-3">
                                        @svg('fluent-apps-add-in', 'shrink-0 h-6 w-6 text-gray-400 group-hover:text-amber-500 transition ease-in-out duration-150')

                                        <span class="truncate">
                                            AnodyneXtras
                                        </span>
                                    </div>
                                </a>
                            </li>
                        @endif

                        @if (config('services.anodyne.galaxy'))
                            <li>
                                <a
                                    href="{{ route('galaxy.index') }}"
                                    class="group px-3 py-2 transition-colors duration-200 relative flex items-center hover:text-amber-500 text-gray-500"
                                    aria-current="page"
                                >
                                    <div class="group relative flex items-center space-x-3">
                                        @svg('fluent-rocket', 'shrink-0 h-6 w-6 text-gray-400 group-hover:text-amber-500 transition ease-in-out duration-150')

                                        <span class="truncate">
                                            Galaxy
                                        </span>
                                    </div>
                                </a>
                            </li>
                        @endif

                        <li>
                            <a
                                href="https://discord.gg/7WmKUks"
                                target="_blank"
                                class="group px-3 py-2 transition-colors duration-200 relative flex items-center hover:text-amber-500 text-gray-500"
                                aria-current="page"
                            >
                                <div class="group relative flex items-center space-x-3">
                                    @svg('fluent-chat-bubbles-help', 'shrink-0 h-6 w-6 text-gray-400 group-hover:text-amber-500 transition ease-in-out duration-150')

                                    <span class="truncate">
                                        Get Help
                                    </span>
                                </div>
                            </a>
                        </li>
                    </ul>

                    @if (count(config('services.anodyne.docs-versions')) > 1)
                        <div>
                            <div class="relative pb-2" x-data="{ open: false }" @click.away="open = false">
                                <button class="flex items-center justify-between w-full px-4 py-1.5 rounded-full bg-gray-200 border border-gray-200 hover:border-gray-300 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-300" @click="open = !open">
                                    <span class="text-sm font-medium text-gray-600">Nova {{ request()->route()->version }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-gray-400"><path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>

                                <div class="origin-top-left absolute left-0 mt-2 w-56 rounded-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-30" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" x-show="open" x-description="Dropdown panel, show/hide based on dropdown state." x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                                    <div class="py-1 px-1" role="none">
                                        @foreach (config('services.anodyne.docs-versions') as $ver)
                                            <a class="block relative rounded-md px-2 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200" role="menuitem" tabindex="-1" href="{{ route('docs', $ver) }}">
                                                <span>Nova {{ $ver }}</span>
                                                <span class="sr-only">documentation</span>

                                                @if ($ver === request()->route()->version)
                                                    <span class="absolute inset-y-0 right-0 flex items-center pr-2 text-amber-500">
                                                        @svg('fluent-checkmark-circle', 'h-6 w-6')
                                                    </span>
                                                @endif
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @foreach ($sections as $section)
                        <div>
                            @isset($section['title'])
                                <h5 class="flex items-center justify-between px-3 mb-3 lg:mb-3 uppercase tracking-wider font-semibold text-sm lg:text-xs text-gray-900 cursor-pointer" @click="selected === {{ $section['index'] }} ? selected = -1 : selected = {{ $section['index'] }}">
                                    <span>{{ $section['title'] }}</span>

                                    <div>
                                        {{-- Down chevron --}}
                                        <svg x-show="selected === {{ $section['index'] }}" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>

                                        {{-- Right chevron --}}
                                        <svg x-cloak x-show="selected !== {{ $section['index'] }}" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                                    </div>
                                </h5>
                            @endisset

                            <div class="relative overflow-hidden transition-all max-h-[0px] duration-700" x-ref="container{{ $section['index'] }}" x-bind:style="selected === {{ $section['index'] }} ? 'max-height: ' + $refs.container{{ $section['index'] }}.scrollHeight + 'px' : ''">
                                <ul>
                                    @foreach ($section['pages'] as $page)
                                        @php($slug = $page['file'] ?? $page)
                                        <li>
                                            <a
                                                href="{{ $page['link'] ?? route('docs', [$version, $slug]) }}"
                                                @isset($page['link']) target="_blank" @endisset
                                                class="group px-3 py-2 transition-colors duration-200 relative flex items-center {{ $current === $slug ? 'text-amber-600' : 'hover:text-gray-900 text-gray-500' }}"
                                                aria-current="page"
                                            >
                                                <span class="rounded-lg absolute inset-0 bg-amber-50 z-0 {{ $current === $slug ? 'opacity-100' : 'opacity-0' }}"></span>

                                                <div class="group relative flex items-center">
                                                    @isset($page['icon'])
                                                    @svg($page['icon'], 'shrink-0 -ml-1 mr-3 h-6 w-6 text-gray-500 group-hover:text-gray-600 transition ease-in-out duration-150')
                                                    @endisset

                                                    <span class="truncate">
                                                        {{ $page['name'] ?? str_replace('-', ' ', Illuminate\Support\Str::title($slug)) }}
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </nav>
            </div>

            <div class="z-10 shrink-0 order-2 hidden w-64 min-w-0 xl:block xl:pl-8">
                <div class="sticky top-0 max-h-screen pt-[120px] pb-10 overflow-y-auto mt-[-72px]">
                    <div>
                        <p class="text-xs font-semibold tracking-wide text-gray-900 uppercase">On this page</p>
                        {{ $toc }}
                    </div>
                </div>
            </div>

            <main class="flex flex-1 min-w-0 py-12">
                <div class="flex-1 min-w-0 max-w-[800px] mx-auto order-1">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    <footer>
        <div class="py-8 text-sm text-gray-400 text-center">
            Syntax highlighting provided by <a href="https://torchlight.dev" target="_blank" class="underline">Torchlight</a>.
        </div>
    </footer>
</x-base-layout>