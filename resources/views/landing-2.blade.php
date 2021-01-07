@inject('github', 'github')

<x-layouts.base bg-color="gray-50">
    <div>
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
        <div class="bg-gray-800">
            <div class="max-w-7xl mx-auto py-8 px-4 sm:py-12 sm:px-6 lg:px-8">
                &nbsp;
            </div>
        </div>

        <div class="bg-gray-50">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-24 lg:px-8">
                <div class="lg:text-center">
                    <a name="features"></a>
                    <h2 class="text-base text-light-blue-600 font-semibold tracking-wide uppercase">Features</h2>
                    <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                        All-in-one platform
                    </p>
                    {{-- <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                        Ac euismod vel sit maecenas id pellentesque eu sed consectetur. Malesuada adipiscing sagittis vel nulla nec.
                    </p> --}}
                </div>

                <div class="py-12">
                    <div class="max-w-xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                        <h2 class="sr-only">A better way to send money.</h2>
                        <dl class="space-y-10 lg:space-y-0 lg:grid lg:grid-cols-2 lg:gap-8">
                            <div>
                                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-light-blue-500 text-white">
                                    <!-- Heroicon name: lock -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </div>
                                    <div class="mt-5">
                                        <dt class="text-lg leading-6 font-medium text-gray-900">
                                            Post locking
                                        </dt>
                                        <dd class="mt-2 text-base text-gray-500">
                                            Frustrated when an update you just made to a post gets wiped out because someone else was editing at the same time? No more. Never have your changes overwritten with a smart post locking system that locks and unlocks multi-author posts during editing.
                                        </dd>
                                    </div>
                                </div>

                                <div>
                                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-light-blue-500 text-white">
                                        <!-- Heroicon name: speakerphone -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                        </svg>
                                    </div>
                                    <div class="mt-5">
                                        <dt class="text-lg leading-6 font-medium text-gray-900">
                                            Say anything
                                        </dt>
                                        <dd class="mt-2 text-base text-gray-500">
                                            Site messages in Nova can now contain previously disallowed HTML content meaning that just about anything you want to share can be done from right inside Nova without having to touch any files. Just copy and paste your code into the message!
                                        </dd>
                                    </div>
                                </div>

                                <div>
                                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-light-blue-500 text-white">
                                        <!-- Heroicon name: lightning-bold -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                    <div class="mt-5">
                                        <dt class="text-lg leading-6 font-medium text-gray-900">
                                            <div class="flex items-center space-x-6">
                                                <span>Event system</span>
                                                <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                                    Experimental feature
                                                </span>
                                            </div>
                                        </dt>
                                        <dd class="mt-2 text-base text-gray-500">
                                            Mod developers can listen for specific events during Nova's lifecycle or even listen for specific calls to the database and hook into those events to code specific functionality, modifications, or changes to the core system.
                                        </dd>
                                    </div>
                                </div>

                                <div>
                                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-light-blue-500 text-white">
                                        <!-- Heroicon name: puzzle -->
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z" />
                                        </svg>
                                    </div>
                                    <div class="mt-5">
                                        <dt class="text-lg leading-6 font-medium text-gray-900">
                                            <div class="flex items-center space-x-6">
                                                <span>Extensions</span>
                                                <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                                                    Experimental feature
                                                </span>
                                            </div>
                                        </dt>
                                        <dd class="mt-2 text-base text-gray-500">
                                            Mod developers can take advantage of a new extension system in Nova 2 to write significantly more robust mods that extend Nova beyond its default capabilities.
                                        </dd>
                                    </div>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <dl class="mt-12 space-y-10 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 lg:grid-cols-4 lg:gap-x-8">
                        <div class="flex">
                            <!-- Heroicon name: check -->
                            <svg class="flex-shrink-0 h-6 w-6 text-light-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <div class="ml-3">
                                <dt class="text-lg leading-6 font-medium text-gray-900">
                                    Find
                                </dt>
                                <dd class="mt-2 text-base text-gray-500">
                                    Search through all your content to find what you're looking for.
                                </dd>
                            </div>
                        </div>

                        <div class="flex">
                            <!-- Heroicon name: check -->
                            <svg class="flex-shrink-0 h-6 w-6 text-light-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <div class="ml-3">
                                <dt class="text-lg leading-6 font-medium text-gray-900">
                                    Change
                                </dt>
                                <dd class="mt-2 text-base text-gray-500">
                                    Lots of customization options with powerful developer tools.
                                </dd>
                            </div>
                        </div>

                        <div class="flex">
                            <!-- Heroicon name: check -->
                            <svg class="flex-shrink-0 h-6 w-6 text-light-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <div class="ml-3">
                                <dt class="text-lg leading-6 font-medium text-gray-900">
                                    Share
                                </dt>
                                <dd class="mt-2 text-base text-gray-500">
                                    Collaborate with other users through a simple built-in wiki.
                                </dd>
                            </div>
                        </div>

                        <div class="flex">
                            <!-- Heroicon name: check -->
                            <svg class="flex-shrink-0 h-6 w-6 text-light-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            <div class="ml-3">
                                <dt class="text-lg leading-6 font-medium text-gray-900">
                                    Gather
                                </dt>
                                <dd class="mt-2 text-base text-gray-500">
                                    Get what you want from users through customizable forms.
                                </dd>
                            </div>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

        @if (version_compare($latestVersion, '2.7.0', '>='))
        <div class="bg-gray-800">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-24 lg:px-8 lg:grid lg:grid-cols-3 lg:gap-x-8">
                <div>
                    <h2 class="text-base font-semibold text-light-blue-500 uppercase tracking-wide">Nova 2.7</h2>
                    <p class="mt-2 text-3xl font-extrabold text-gray-50">What's new in Nova</p>
                </div>
                <div class="mt-12 lg:mt-0 lg:col-span-2">
                    <dl class="space-y-10 sm:space-y-0 sm:grid sm:grid-cols-2 sm:grid-rows-3 sm:grid-flow-col sm:gap-x-6 sm:gap-y-10 lg:gap-x-8">
                        <div class="flex">
                            <!-- Heroicon name: check -->
                            <svg class="flex-shrink-0 h-6 w-6 text-light-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                            <div class="ml-3">
                                <dt class="text-lg leading-6 font-medium text-gray-400">
                                    CodeIgniter 3
                                </dt>
                                <dd class="mt-2 text-base text-gray-500">
                                    Nova's framework has been updated to a newer, more secure version.
                                </dd>
                            </div>
                        </div>

                        <div class="flex">
                            <!-- Heroicon name: check -->
                            <svg class="flex-shrink-0 h-6 w-6 text-light-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                            <div class="ml-3">
                                <dt class="text-lg leading-6 font-medium text-gray-400">
                                    Game stats update
                                </dt>
                                <dd class="mt-2 text-base text-gray-500">
                                    In addition to existing game stats, Nova will display word counts and word count averages.
                                </dd>
                            </div>
                        </div>

                        <div class="flex">
                            <!-- Heroicon name: check -->
                            <svg class="flex-shrink-0 h-6 w-6 text-light-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                            <div class="ml-3">
                                <dt class="text-lg leading-6 font-medium text-gray-400">
                                    PHP 5.6+
                                </dt>
                                <dd class="mt-2 text-base text-gray-500">
                                    Nova will require PHP 5.6 or higher to run.
                                </dd>
                            </div>
                        </div>

                        <div class="flex">
                            <!-- Heroicon name: check -->
                            <svg class="flex-shrink-0 h-6 w-6 text-light-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                            <div class="ml-3">
                                <dt class="text-lg leading-6 font-medium text-gray-400">
                                    Word counts
                                </dt>
                                <dd class="mt-2 text-base text-gray-500">
                                    Posts and logs will track, display, and store the number of words in a post.
                                </dd>
                            </div>
                        </div>

                        <div class="flex">
                            <!-- Heroicon name: check -->
                            <svg class="flex-shrink-0 h-6 w-6 text-light-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                            <div class="ml-3">
                                <dt class="text-lg leading-6 font-medium text-gray-400">
                                    Nova 3 Migration Updates
                                </dt>
                                <dd class="mt-2 text-base text-gray-500">
                                    Several code changes will make eventual data migrations to Nova 3 easier.
                                </dd>
                            </div>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
        @endif

        <div class="bg-gray-50" x-data="{'version': '{{ $latestVersion }}', 'genre': ''}">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
                <a name="download"></a>
                <div class="bg-light-blue-700 rounded-lg shadow-xl overflow-hidden lg:grid lg:grid-cols-2 lg:gap-4">
                    <div class="pt-10 pb-12 px-6 sm:pt-16 sm:px-16 lg:py-16 lg:pr-0 xl:py-20 xl:px-20">
                        <div class="lg:self-center">
                            <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                                <span class="block">Ready to get started?</span>
                                <span class="block text-light-blue-300">Download Nova today.</span>
                            </h2>

                            <div class="mt-6 flex items-center justify-between space-x-6">
                                <div class="flex-1">
                                    <div>
                                        <label for="version" class="block text-sm font-medium text-light-blue-200">Version</label>
                                        <select id="version" x-model="version" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-transparent focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm rounded-md shadow-sm">
                                            <option value="{{ $latestVersion }}">{{ $latestVersion }} (Latest)</option>
                                            <option value="2.3.2">2.3.2 (Legacy)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="flex-1">
                                    <div>
                                        <label for="genre" class="block text-sm font-medium text-light-blue-200">Genre</label>
                                        <select id="genre" x-model="genre" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-transparent focus:outline-none focus:ring-light-blue-500 focus:border-light-blue-500 sm:text-sm rounded-md shadow-sm">
                                            <option value="">Select a genre</option>
                                            <option value="bl5">Babylon 5</option>
                                            <option value="blk">Blank</option>
                                            <option value="bsg">Battlestar Galactica</option>
                                            <option value="dnd">Dungeons and Dragons</option>
                                            <option value="dsv">seaQuest DSV</option>
                                            <option value="sga">Stargate Atlantis</option>
                                            <option value="sg1">Stargate SG-1</option>
                                            <option value="baj">Bajorans (Star Trek)</option>
                                            <option value="crd">Cardassians (Star Trek)</option>
                                            <option value="ds9">Deep Space Nine (Star Trek)</option>
                                            <option value="ent">Enterprise era (Star Trek)</option>
                                            <option value="kli">Klingons (Star Trek)</option>
                                            <option value="mov">Movie era (Star Trek)</option>
                                            <option value="rom">Romulans (Star Trek)</option>
                                            <option value="tos">The Original Series (Star Trek)</option>
                                            <option value="sto">Star Trek Online</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div x-show="version === '2.3.2'" class="mt-8 flex space-x-3 text-white font-medium text-sm leading-6">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-7 w-7 flex-shrink-0 text-amber-400"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                                <span>Nova 2.3.2 is legacy software and intended only for games hosted on a server running PHP 5.2. This version of Nova is no longer receiving updates.</span>
                            </div>

                            <a x-show="genre && version" :href=`/downloads/nova2/nova-${version}-${genre}.zip` class="mt-8 bg-white border border-transparent rounded-md shadow px-6 py-3 inline-flex items-center space-x-3 text-base font-medium text-light-blue-600 hover:bg-light-blue-50">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                                <span>Download now</span>
                            </a>
                        </div>
                    </div>
                    <div class="-mt-6 aspect-w-5 aspect-h-3 md:aspect-w-2 md:aspect-h-1">
                        <img class="transform translate-x-6 translate-y-6 rounded-md object-cover object-left-top sm:translate-x-12 lg:translate-y-20" src="{{ asset('images/nova2-admin.png') }}" alt="App screenshot">
                    </div>
                </div>
            </div>
        </div>

        <footer class="bg-gray-50">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
                <div class="flex justify-center space-x-6 md:order-2">
                    <a href="https://facebook.com/anodyneproductions" target="_blank" class="text-gray-400 hover:text-gray-500 transition-all ease-in-out duration-200">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                        </svg>
                    </a>

                    <a href="https://twitter.com/anodyneprod" target="_blank" class="text-gray-400 hover:text-gray-500 transition-all ease-in-out duration-200">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                    </a>

                    <a href="https://github.com/anodyne" target="_blank" class="text-gray-400 hover:text-gray-500 transition-all ease-in-out duration-200">
                        <span class="sr-only">GitHub</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                        </svg>
                    </a>

                    <a href="https://discord.gg/7WmKUks" target="_blank" class="text-gray-400 hover:text-gray-500 transition-all ease-in-out duration-200">
                        <span class="sr-only">Discord</span>
                        <x-logos.discord class="h-6 w-auto" />
                    </a>
                </div>
                <div class="mt-8 md:mt-0 md:order-1">
                    <p class="text-center text-base text-gray-400">
                        &copy; {{ date('Y') }} Anodyne Productions. All rights reserved.
                    </p>
                </div>
            </div>
        </footer>
    </x-layouts.base>