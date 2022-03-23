<header x-data="{ open: false }" class="py-2 lg:pt-0 lg:pb-24 bg-gray-800">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="relative flex flex-wrap items-center justify-center lg:justify-between">
            <!-- Logo -->
            <div class="absolute left-0 py-5 shrink-0 lg:static">
                <a href="{{ route('home') }}">
                    <span class="sr-only">Anodyne</span>
                    <x-logos.anodyne text-color="white" class="h-8 w-auto hidden md:block" gradient />
                    <x-logos.anodyne-mark class="h-auto w-8 block md:hidden" gradient />
                </a>
            </div>

            <!-- Right section on desktop -->
            <div class="hidden lg:ml-4 lg:flex lg:items-center lg:py-5 lg:pr-0.5">
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button class="flex text-sm border-2 border-transparent focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                            <img class="h-8 w-8 squircle object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>
                        @else
                        <span class="inline-flex rounded-md">
                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                {{ Auth::user()->name }}

                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </span>
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-jet-dropdown-link>
                        @endif

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            </div>

            <div class="w-full py-5 lg:border-t lg:border-white lg:border-opacity-20">
                <div class="lg:grid lg:grid-cols-3 lg:gap-8 lg:items-center">
                    <!-- Left nav -->
                    <div class="hidden lg:block lg:col-span-2">
                        <nav class="flex space-x-4">
                            <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-jet-nav-link>

                            @can('viewAny', Domain\Users\Models\User::class)
                            <x-jet-nav-link href="{{ route('users') }}" :active="request()->routeIs('users')">
                                {{ __('Users') }}
                            </x-jet-nav-link>
                            @endcan
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Menu button -->
            <div class="absolute right-0 shrink-0 lg:hidden">
                <!-- Mobile menu button -->
                <button @click="open = !open" class="bg-transparent p-2 rounded-md inline-flex items-center justify-center text-gray-400 hover:text-white hover:bg-white hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-white" x-bind:aria-expanded="open">
                    <span class="sr-only">Open main menu</span>
                    <svg x-state:on="Menu open" x-state:off="Menu closed" :class="{ 'hidden': open, 'block': !open }" class="block h-6 w-6" x-description="Heroicon name: menu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-state:on="Menu open" x-state:off="Menu closed" :class="{ 'hidden': !open, 'block': open }" class="hidden h-6 w-6" x-description="Heroicon name: x" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-description="Mobile menu overlay, show/hide based on mobile menu state." x-show="open" x-transition:enter="duration-150 ease-out" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="duration-150 ease-in" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="z-20 fixed inset-0 bg-black bg-opacity-25 lg:hidden" aria-hidden="true" style="display: none;"></div>

    <div x-description="Mobile menu, show/hide based on mobile menu state." x-show="open" x-transition:enter="duration-150 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-150 ease-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="z-30 absolute top-0 inset-x-0 max-w-3xl mx-auto w-full p-2 transition origin-top lg:hidden" style="display: none;">
        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y divide-gray-200">
            <div class="pt-3 pb-2">
                <div class="flex items-center justify-between px-4">
                    <div>
                        <x-logos.anodyne-mark class="h-8 w-auto" gradient />
                    </div>
                    <div class="-mr-2">
                        <button @click="open = false" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-500">
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" x-description="Heroicon name: x" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="mt-3 px-2 space-y-1">
                    <a href="{{ route('dashboard') }}" class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">{{ __('Dashboard') }}</a>

                    <a href="{{ route('users') }}" class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">{{ __('Users') }}</a>
                </div>
            </div>
            <div class="pt-4 pb-2">
                <div class="flex items-center px-5">
                    <div class="shrink-0">
                        <img class="h-10 w-10 squircle" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                    </div>
                    <div class="ml-3 min-w-0 flex-1">
                        <div class="text-base font-medium text-gray-800 truncate">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium text-gray-500 truncate">{{ Auth::user()->email }}</div>
                    </div>
                </div>
                <div class="mt-3 px-2 space-y-1">
                    <a href="{{ route('profile.show') }}" class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800">{{ __('Profile') }}</a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="{{ route('logout') }}" class="block rounded-md px-3 py-2 text-base text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-800" onclick="event.preventDefault();this.closest('form').submit();">{{ __('Logout') }}</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>