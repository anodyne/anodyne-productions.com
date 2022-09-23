<div class="relative bg-gray-800 overflow-hidden" x-data="{ open: false }">
    <div class="relative pt-6 pb-16 sm:pb-24">
        <nav class="relative max-w-7xl mx-auto flex items-center justify-between px-4 sm:px-6" aria-label="Global">
            <div class="flex items-center flex-1">
                <div class="flex items-center justify-between w-full md:w-auto">
                    <a href="#">
                        <span class="sr-only">Anodyne</span>
                        <img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="">
                    </a>
                    <div class="-mr-2 flex items-center md:hidden">
                        <button type="button" class="bg-gray-800 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-700 focus:outline-none focus:ring-2 focus-ring-inset focus:ring-white" id="main-menu" aria-haspopup="true" @click="open = true">
                            <span class="sr-only">Open main menu</span>
                            <!-- Heroicon name: menu -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="hidden space-x-10 md:flex md:ml-10">
                    <a href="#features" class="font-medium text-white hover:text-gray-300">Features</a>

                    <a href="#download" class="font-medium text-white hover:text-gray-300">Download</a>

                    <a href="{{ route('docs') }}" class="font-medium text-white hover:text-gray-300">Documentation</a>

                    <a href="#resources" class="font-medium text-white hover:text-gray-300">Resources</a>

                    @if (config('services.anodyne.v2.marketplace'))
                        <a href="{{ route('marketplace.index') }}" class="font-medium text-white hover:text-gray-300">Marketplace</a>
                    @endif

                    <a href="https://discord.gg/7WmKUks" target="_blank" class="font-medium text-white hover:text-gray-300">Support</a>
                </div>
            </div>

            @if (config('services.anodyne.v2.login'))
                <div class="hidden md:flex">
                    <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700">
                        Log in
                    </a>
                </div>
            @endif
        </nav>

        <!--
            Mobile menu, show/hide based on menu open state.

            Entering: "duration-150 ease-out"
            From: "opacity-0 scale-95"
            To: "opacity-100 scale-100"
            Leaving: "duration-100 ease-in"
            From: "opacity-100 scale-100"
            To: "opacity-0 scale-95"
        -->
        <div class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden" x-show="open" x-description="Mobile menu, show/hide based on menu open state" x-transition:enter="duration-150 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
            <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                <div class="px-5 pt-4 flex items-center justify-between">
                    <div>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">
                    </div>
                    <div class="-mr-2">
                        <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-light-blue-500" @click="open = false">
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
                        <a href="#features" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50" role="menuitem">Features</a>

                        <a href="#download" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50" role="menuitem">Download</a>

                        <a href="{{ route('docs') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50" role="menuitem">Documentation</a>

                        <a href="#resources" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50" role="menuitem">Resources</a>

                        @if (config('services.anodyne.v2.marketplace'))
                            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50" role="menuitem">Marketplace</a>
                        @endif

                        <a href="https://discord.gg/7WmKUks" target="_blank" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50" role="menuitem">Support</a>
                    </div>

                    @if (config('services.anodyne.v2.login'))
                        <div role="none">
                            <a href="#" class="block w-full px-5 py-3 text-center font-medium text-light-blue-600 bg-gray-50 hover:bg-gray-100" role="menuitem">
                                Log in
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <main class="mt-16 sm:mt-24">
            <div class="mx-auto max-w-7xl">
                <div class="lg:grid lg:grid-cols-12 lg:gap-8">
                    <div class="px-4 sm:px-6 sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left lg:flex lg:items-center">
                        <div>
                            <a href="#" class="inline-flex items-center text-white bg-gray-900 rounded-full p-1 pr-2 sm:text-base lg:text-sm xl:text-base hover:text-gray-200">
                                <span class="px-3 py-0.5 text-white text-xs font-semibold leading-5 uppercase tracking-wide bg-gradient-to-r from-fuchsia-500 to-purple-600 rounded-full">Nova 3 is coming</span>
                                <span class="ml-4 text-sm">Visit the preview page</span>
                                <!-- Heroicon name: chevron-right -->
                                <svg class="ml-2 w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            <h1 class="mt-4 text-4xl tracking-tight font-extrabold text-white sm:mt-5 sm:leading-none lg:mt-6 lg:text-5xl xl:text-6xl">
                                <span class="md:block">Painless</span>
                                <span class="text-light-blue-400 md:block">RPG management</span>
                            </h1>
                            <p class="mt-3 text-base text-gray-300 sm:mt-5 sm:text-xl lg:text-lg xl:text-xl">
                                With an easy-to-use interface, powerful posting system, a wide array of developer tools and much more, Nova is all you need to help you stop just managing your game and get back to actually playing it.
                            </p>
                        </div>
                    </div>
                    <div class="mt-16 sm:mt-24 lg:mt-0 lg:col-span-6">
                        <div class="-mt-6 lg:-mt-32 aspect-w-4 aspect-h-3 md:aspect-w-4 md:aspect-h-3">
                            <img class="transform translate-x-0 translate-y-6 rounded-md object-cover object-left-top sm:translate-x-40 lg:translate-y-20" src="{{ asset('images/nova2-manifest.png') }}" alt="App screenshot">
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>