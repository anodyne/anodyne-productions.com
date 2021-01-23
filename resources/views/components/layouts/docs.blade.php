@props([
    'sections' => [],
    'current' => '',
    'version' => 'main',
])

<x-layouts.base bg-color="white">
    <div class="h-screen overflow-hidden flex" x-data="{ sidebarOpen: false }" @keydown.window.escape="sidebarOpen = false">
        <div x-show="sidebarOpen" class="md:hidden" x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state." style="display: none;">
            <div class="fixed inset-0 z-40 flex">
                <div @click="sidebarOpen = false" x-show="sidebarOpen" x-description="Off-canvas menu overlay, show/hide based on off-canvas menu state." x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0" aria-hidden="true" style="display: none;">
                    <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
                </div>

                <div x-show="sidebarOpen" x-description="Off-canvas menu, show/hide based on off-canvas menu state." x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="relative max-w-xs w-full bg-white pt-5 pb-4 flex-1 flex flex-col" style="display: none;">
                    <div class="absolute top-0 right-0 -mr-12 pt-2">
                        <button x-show="sidebarOpen" @click="sidebarOpen = false" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" style="display: none;">
                            <span class="sr-only">Close sidebar</span>
                            <svg class="h-6 w-6 text-white" x-description="Heroicon name: x" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex-shrink-0 px-4 flex items-center">
                        <x-logos.anodyne class="h-8 w-auto" gradient />
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
                                            @svg('fluent-class', 'flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-amber-500 transition ease-in-out duration-150')

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
                                                @svg('fluent-apps-add-in', 'flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-amber-500 transition ease-in-out duration-150')

                                                <span class="truncate">
                                                    Exchange
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
                                                @svg('fluent-rocket', 'flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-amber-500 transition ease-in-out duration-150')

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
                                            @svg('fluent-chat-bubbles-help', 'flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-amber-500 transition ease-in-out duration-150')

                                            <span class="truncate">
                                                Get Help
                                            </span>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                            <div class="px-3">
                                <ul>
                                    <li>
                                        <a
                                            href="{{ route('docs', '2.6') }}"
                                            class="group px-3 py-2 transition ease-in-out duration-200 relative flex items-center hover:text-amber-500 text-gray-500"
                                            aria-current="page"
                                        >
                                            <div class="group relative flex items-center space-x-3">
                                                <span class="truncate">
                                                    Nova 2.6
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ route('docs', '3.0') }}"
                                            class="group px-3 py-2 transition ease-in-out duration-200 relative flex items-center hover:text-amber-500 text-gray-500"
                                            aria-current="page"
                                        >
                                            <div class="group relative flex items-center space-x-3">
                                                <span class="truncate">
                                                    Nova 3.0
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>

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
                                                            @svg($page['icon'], 'flex-shrink-0 -ml-1 mr-3 h-6 w-6 text-gray-500 group-hover:text-gray-600 transition ease-in-out duration-150')
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
                <div class="flex-shrink-0 w-14">
                    <!-- Dummy element to force sidebar to shrink to fit close icon -->
                </div>
            </div>
        </div>

        <!-- Static sidebar for desktop -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="w-64 flex flex-col">
                <!-- Sidebar component, swap this element with another sidebar if you like -->
                <div class="pb-4 flex flex-col flex-grow overflow-y-auto">
                    <div class="bg-white z-50 flex-shrink-0 px-4 flex items-center pt-8">
                        <x-logos.anodyne class="h-8 w-auto" gradient />
                    </div>

                    <div class="relative flex-grow mt-5 flex flex-col z-30">
                        <nav class="flex-1 px-2 pt-4 pb-8 font-medium text-base lg:text-sm space-y-8">
                            <ul>
                                <li>
                                    <a
                                        href="{{ route('docs') }}"
                                        class="group px-3 py-2 transition ease-in-out duration-200 relative flex items-center hover:text-amber-500 text-gray-500"
                                        aria-current="page"
                                    >
                                        <div class="group relative flex items-center space-x-3">
                                            @svg('fluent-class', 'flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-amber-500 transition ease-in-out duration-150')

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
                                                @svg('fluent-apps-add-in', 'flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-amber-500 transition ease-in-out duration-150')

                                                <span class="truncate">
                                                    Exchange
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
                                                @svg('fluent-rocket', 'flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-amber-500 transition ease-in-out duration-150')

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
                                            @svg('fluent-chat-bubbles-help', 'flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-amber-500 transition ease-in-out duration-150')

                                            <span class="truncate">
                                                Get Help
                                            </span>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                            <div class="px-3">
                                <x-dropdown trigger-color="dark-gray-text" width="40">
                                    <x-slot name="trigger">
                                        <span>Nova {{ request()->route()->version }}</span>
                                        <svg class="-mr-1 ml-2 h-5 w-5" fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"></path></svg>
                                    </x-slot>

                                    <x-dropdown.group>
                                        @foreach (['3.0', '2.6'] as $version)
                                            <x-dropdown.item :href="route('docs', [$version])">Nova {{ $version }}</x-dropdown.item>
                                        @endforeach
                                    </x-dropdown.group>
                                </x-dropdown>
                            </div>

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
                                                        @svg($page['icon'], 'flex-shrink-0 -ml-1 mr-3 h-6 w-6 text-gray-500 group-hover:text-gray-600 transition ease-in-out duration-150')
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
            </div>
        </div>

        <div class="flex-1 mx-auto w-0 flex flex-col md:px-8">
            <div class="relative z-10 flex-shrink-0 h-16 bg-white shadow-lg flex">
                <div class="flex items-center justify-between w-full md:w-auto px-6">
                    <a href="/">
                        <span class="sr-only">Anodyne</span>
                        <x-logos.anodyne class="h-8 w-auto sm:h-10" gradient />
                    </a>
                    <div class="flex items-center md:hidden">
                        <button type="button" class="rounded-lg p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus-ring-inset focus:ring-white" id="main-menu" aria-haspopup="true" @click.stop="sidebarOpen = true">
                            <span class="sr-only">Open main menu</span>
                            <!-- Heroicon name: menu -->
                            <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <main class="flex-1 relative overflow-y-auto focus:outline-none">
                <div class="py-6">
                    <div class="flex px-4 sm:px-6 md:px-0">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-layouts.base>