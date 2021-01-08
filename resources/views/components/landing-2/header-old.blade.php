<div class="relative overflow-hidden">
    <div class="relative pt-6 pb-16 sm:pb-24" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <nav class="relative flex items-center justify-between sm:h-10 md:justify-center" aria-label="Global">
                <div class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0">
                    <div class="flex items-center justify-between w-full md:w-auto">
                        <a href="/">
                            <span class="sr-only">Anodyne</span>
                            <img class="h-8 w-auto sm:h-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">
                        </a>
                        <div class="-mr-2 flex items-center md:hidden">
                            <button type="button" class="bg-gray-50 rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-light-blue-500" id="main-menu" aria-haspopup="true" @click="open = true">
                                <span class="sr-only">Open main menu</span>
                                <!-- Heroicon name: menu -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="hidden md:flex md:space-x-10">
                    <a href="#features" class="font-medium text-gray-500 hover:text-gray-900 transition-all ease-in-out duration-200">Features</a>

                    <a href="#download" class="font-medium text-gray-500 hover:text-gray-900 transition-all ease-in-out duration-200">Download</a>

                    <a href="{{ route('docs', '2.6') }}" class="font-medium text-gray-500 hover:text-gray-900 transition-all ease-in-out duration-200">Documentation</a>

                    @if (config('services.anodyne.v2.marketplace'))
                    <a href="{{ route('marketplace') }}" class="font-medium text-gray-500 hover:text-gray-900 transition-all ease-in-out duration-200">Marketplace</a>
                    @endif

                    <a href="https://discord.gg/7WmKUks" target="_blank" class="font-medium text-gray-500 hover:text-gray-900 transition-all ease-in-out duration-200">Support</a>
                </div>

                @if (config('services.anodyne.v2.login'))
                <div class="hidden md:absolute md:flex md:items-center md:justify-end md:inset-y-0 md:right-0">
                    <span class="inline-flex rounded-md shadow">
                        <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-light-blue-600 bg-white hover:text-light-blue-500">
                            Log in
                        </a>
                    </span>
                </div>
                @endif
            </nav>
        </div>

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
                        <button type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-light-blue-500" @click="open = false">
                            <span class="sr-only">Close main menu</span>
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

                        <a href="{{ route('docs', '2.6') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50" role="menuitem">Documentation</a>

                        @if (config('services.anodyne.v2.marketplace'))
                        <a href="{{ route('marketplace') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50" role="menuitem">Marketplace</a>
                        @endif

                        <a href="https://discord.gg/7WmKUks" target="_blank" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50" role="menuitem">Support</a>
                    </div>

                    @if (config('services.anodyne.v2.login'))
                    <div role="none">
                        <a href="#" class="block w-full px-5 py-3 text-center font-medium text-light-blue-600 bg-gray-50 hover:bg-gray-100 hover:text-light-blue-700" role="menuitem">
                            Log in
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="mt-16 mx-auto max-w-7xl px-4 sm:mt-24 sm:px-6">
            <div class="text-center">
                <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                    <span class="text-light-blue-600">Painless</span>
                    <span>RPG Management</span>
                </h1>
                <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                    With an easy-to-use interface, powerful posting system, a wide array of developer tools and much more, Nova is all you need to help you stop just managing your game and get back to actually playing it.
                </p>
            </div>
        </div>
    </div>
    <div class="relative">
        <div class="absolute inset-0 flex flex-col" aria-hidden="true">
            <div class="flex-1"></div>
            <div class="flex-1 w-full bg-gray-800"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <img class="relative rounded-lg shadow-lg" src="{{ asset('images/nova2-manifest.png') }}" alt="App screenshot">
        </div>
    </div>
</div>
{{-- <div class="bg-gray-800">
    <div class="max-w-7xl mx-auto py-8 px-4 sm:py-12 sm:px-6 lg:px-8">
        &nbsp;
    </div>
</div> --}}