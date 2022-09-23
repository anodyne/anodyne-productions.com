<nav class="relative max-w-7xl mx-auto flex items-center justify-between px-4 sm:px-6 lg:px-8" aria-label="Global">
    <div class="flex items-center flex-1">
        <div class="flex items-center justify-between w-full md:w-auto">
            <a href="/">
                <span class="sr-only">Anodyne</span>
                <x-logos.anodyne text-color="text-white" class="h-8 w-auto" gradient />
            </a>
            <div class="-mr-2 flex items-center md:hidden">
                <button type="button" class="bg-gray-800 rounded-lg p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-700 focus:outline-none focus:ring-2 focus-ring-inset focus:ring-white" id="main-menu" aria-haspopup="true" @click="open = true">
                    <span class="sr-only">Open main menu</span>
                    <!-- Heroicon name: menu -->
                    <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="hidden space-x-10 md:flex md:ml-16">
            <a href="#features" class="font-medium text-white hover:text-gray-300">Features</a>

            <a href="#download" class="font-medium text-white hover:text-gray-300">Download</a>

            <a href="{{ route('docs') }}" class="font-medium text-white hover:text-gray-300">Docs</a>

            <a href="#resources" class="font-medium text-white hover:text-gray-300">Resources</a>

            @if (config('services.anodyne.exchange'))
                <a href="{{ route('exchange.index') }}" class="font-medium text-white hover:text-gray-300">Exchange</a>
            @else
                <a href="https://xtras.anodyne-productions.com" target="_blank" class="font-medium text-white hover:text-gray-300">AnodyneXtras</a>
            @endif

            <a href="https://discord.gg/7WmKUks" target="_blank" class="font-medium text-white hover:text-gray-300">Get Help</a>
        </div>
    </div>

    @if (config('services.anodyne.login'))
        <div class="hidden md:flex">
            @auth
                <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-gray-600 hover:bg-gray-700">
                    Dashboard
                </a>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-gray-600 hover:bg-gray-700">
                    Log in
                </a>
            @endguest
        </div>
    @endif
</nav>

<div class="absolute top-0 inset-x-0 p-2 transition origin-top-right md:hidden" x-show="open" x-description="Mobile menu, show/hide based on menu open state" x-transition:enter="duration-150 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
    <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
        <div class="px-5 pt-4 flex items-center justify-between">
            <div>
                <x-logos.anodyne class="h-8 w-auto" gradient />
            </div>
            <div class="-mr-2">
                <button type="button" class="bg-white rounded-lg p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-light-blue-500" @click="open = false">
                    <span class="sr-only">Close menu</span>
                    <!-- Heroicon name: x -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <div role="menu" aria-orientation="vertical" aria-labelledby="main-menu">
            <div class="px-2 pt-2 pb-3 space-y-1" role="none">
                <a href="#features" class="block px-3 py-2 rounded-lg text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50" role="menuitem">Features</a>

                <a href="#download" class="block px-3 py-2 rounded-lg text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50" role="menuitem">Download</a>

                <a href="{{ route('docs') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50" role="menuitem">Docs</a>

                <a href="#resources" class="block px-3 py-2 rounded-lg text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50" role="menuitem">Resources</a>

                @if (config('services.anodyne.exchange'))
                    <a href="{{ route('exchange.index') }}" class="block px-3 py-2 rounded-lg text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50" role="menuitem">Exchange</a>
                @else
                    <a href="https://xtras.anodyne-productions.com" target="_blank" class="block px-3 py-2 rounded-lg text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50" role="menuitem">AnodyneXtras</a>
                @endif

                <a href="https://discord.gg/7WmKUks" target="_blank" class="block px-3 py-2 rounded-lg text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50" role="menuitem">Get Help</a>
            </div>

            @if (config('services.anodyne.login'))
                <div role="none">
                    @auth
                        <a href="{{ route('dashboard') }}" class="block w-full px-5 py-3 text-center font-medium text-amber-500 bg-gray-50 hover:bg-gray-100" role="menuitem">
                            Dashboard
                        </a>
                    @endauth

                    @guest
                        <a href="{{ route('login') }}" class="block w-full px-5 py-3 text-center font-medium text-amber-500 bg-gray-50 hover:bg-gray-100" role="menuitem">
                            Log in
                        </a>
                    @endguest
                </div>
            @endif
        </div>
    </div>
</div>