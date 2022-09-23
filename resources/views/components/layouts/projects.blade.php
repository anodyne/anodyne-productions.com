@props(['prose' => false])

<x-base-layout bg-color="white">
    <div class="relative bg-white" x-data="{ mobileMenuOpen: false }">
        <div class="max-w-3xl xl:max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center border-b-2 border-gray-100 py-6 md:justify-start md:space-x-10">
                <div class="flex justify-start lg:w-0 lg:flex-1">
                    <a href="#">
                        <span class="sr-only">Anodyne</span>
                        <x-logos.anodyne class="h-8 sm:h-10 w-auto" gradient />
                    </a>
                </div>
                <div class="-mr-2 -my-2 md:hidden">
                    <button x-on:click="mobileMenuOpen = true" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-amber-500">
                        <span class="sr-only">Open menu</span>
                        <svg class="h-8 w-8" x-description="Heroicon name: menu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
                <nav class="hidden md:flex space-x-10">
                    <div x-on:click.away="flyoutMenuOpen = false" x-data="{ flyoutMenuOpen: false }" class="relative" x-cloak>
                        <button type="button" x-on:click="flyoutMenuOpen = !flyoutMenuOpen" x-state:on="Item active" x-state:off="Item inactive" :class="{ 'text-gray-900': flyoutMenuOpen, 'text-gray-500': !flyoutMenuOpen }" class="group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none text-gray-900">
                            <span>Projects</span>
                            <svg x-state:on="Item active" x-state:off="Item inactive" class="ml-2 h-5 w-5 group-hover:text-gray-500 transition ease-in-out duration-150 text-gray-600" x-bind:class="{ 'text-gray-600': flyoutMenuOpen, 'text-gray-400': !flyoutMenuOpen }" x-description="Heroicon name: chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>

                        <div x-description="Flyout menu, show/hide based on flyout menu state." x-show="flyoutMenuOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="origin-top-right absolute z-10 right-0 mt-3 px-2 w-screen max-w-md sm:px-0 lg:max-w-3xl">
                            <div class="rounded-xl shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                <div class="relative grid gap-6 bg-gray-800 px-5 py-6 sm:gap-8 sm:p-8 lg:grid-cols-2">
                                    <a href="{{ route('projects.identity') }}" class="group -m-3 p-3 flex items-start rounded-lg hover:bg-gray-700 transition ease-in-out duration-150">
                                        <div class="squircle relative shrink-0 flex items-center justify-center h-10 w-10 bg-gradient-to-r from-orange-500 to-amber-500 text-white sm:h-12 sm:w-12">
                                            @svg('fluent-paint-bucket', 'h-7 w-7')
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-base font-medium text-gray-200">
                                                All-new Visual Identity
                                            </p>
                                            <p class="mt-1 text-sm text-gray-400">
                                                A new logo and new brand colors give Anodyne a whole new look.
                                            </p>
                                        </div>
                                    </a>

                                    <a href="{{ route('projects.website') }}" class="group -m-3 p-3 flex items-start rounded-lg hover:bg-gray-700 transition ease-in-out duration-150">
                                        <div class="squircle relative shrink-0 flex items-center justify-center h-10 w-10 bg-gradient-to-r from-orange-500 to-amber-500 text-white sm:h-12 sm:w-12">
                                            @svg('fluent-app-generic', 'h-7 w-7')
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-base font-medium text-gray-200">
                                                Brand-new Website
                                            </p>
                                            <p class="mt-1 text-sm text-gray-400">
                                                Our 6th generation website is simpler and easier to navigate with room to grow.
                                            </p>
                                        </div>
                                    </a>

                                    <a href="{{ route('projects.support') }}" class="group -m-3 p-3 flex items-start rounded-lg hover:bg-gray-700 transition ease-in-out duration-150">
                                        <div class="squircle relative shrink-0 flex items-center justify-center h-10 w-10 bg-gradient-to-r from-orange-500 to-amber-500 text-white sm:h-12 sm:w-12">
                                            @svg('fluent-chat-bubbles-help', 'h-7 w-7')
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-base font-medium text-gray-200">
                                                Support Updates
                                            </p>
                                            <p class="mt-1 text-sm text-gray-400">
                                                Find out how to get support for Nova or join our growing global community.
                                            </p>
                                        </div>
                                    </a>

                                    <a href="{{ route('projects.docs') }}" class="group -m-3 p-3 flex items-start rounded-lg hover:bg-gray-700 transition ease-in-out duration-150">
                                        <div class="squircle relative shrink-0 flex items-center justify-center h-10 w-10 bg-gradient-to-r from-orange-500 to-amber-500 text-white sm:h-12 sm:w-12">
                                            @svg('fluent-class', 'h-7 w-7')
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-base font-medium text-gray-200">
                                                Re-written Nova docs
                                            </p>
                                            <p class="mt-1 text-sm text-gray-400">
                                                We started over to make sure our docs are easier to understand.
                                            </p>
                                        </div>
                                    </a>

                                    <a href="{{ route('projects.exchange') }}" class="group -m-3 p-3 flex items-start rounded-lg hover:bg-gray-700 transition ease-in-out duration-150">
                                        <div class="squircle relative shrink-0 flex items-center justify-center h-10 w-10 bg-gradient-to-r from-orange-500 to-amber-500 text-white sm:h-12 sm:w-12">
                                            @svg('fluent-apps-add-in', 'h-7 w-7')
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-base font-medium text-gray-200">
                                                AnodyneXtras
                                            </p>
                                            <p class="mt-1 text-sm text-gray-400">
                                                AnodyneXtras is being re-built for a better experience and new features.
                                            </p>
                                        </div>
                                    </a>

                                    <a href="{{ route('projects.galaxy') }}" class="group -m-3 p-3 flex items-start rounded-lg hover:bg-gray-700 transition ease-in-out duration-150">
                                        <div class="squircle relative shrink-0 flex items-center justify-center h-10 w-10 bg-gradient-to-r from-orange-500 to-amber-500 text-white sm:h-12 sm:w-12">
                                            @svg('fluent-rocket', 'h-7 w-7')
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-base font-medium text-gray-200">
                                                Secret Project
                                            </p>
                                            <p class="mt-1 text-sm text-gray-400">
                                                We're planning to launch a new service in the second half of 2021, so stay tuned!
                                            </p>
                                        </div>
                                    </a>
                                </div>
                                {{-- <div class="p-5 bg-gray-50 sm:p-8">
                                    <a href="#" class="-m-3 p-3 flow-root rounded-md hover:bg-gray-100 transition ease-in-out duration-150">
                                        <span class="flex items-center">
                                            <span class="text-base font-medium text-gray-900">
                                                Enterprise
                                            </span>
                                            <span class="ml-3 inline-flex items-center px-3 py-0.5 rounded-full text-xs font-medium leading-5 bg-amber-100 text-amber-800">
                                                New
                                            </span>
                                        </span>
                                        <span class="mt-1 block text-sm text-gray-500">
                                            Empower your entire team with even more advanced tools.
                                        </span>
                                    </a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <div x-description="Mobile menu, show/hide based on mobile menu state." x-show="mobileMenuOpen" x-transition:enter="duration-200 ease-out" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute z-50 top-0 inset-x-0 p-2 transition origin-top-right md:hidden">
            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-gray-800 divide-y-2 divide-gray-700">
                <div class="pt-5 pb-6 px-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <x-logos.anodyne text-color="white" class="h-8 w-auto" gradient />
                        </div>
                        <div class="-mr-2">
                            <button x-on:click="mobileMenuOpen = false" type="button" class="rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-200 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-amber-500">
                                <span class="sr-only">Close menu</span>
                                <svg class="h-6 w-6" x-description="Heroicon name: x" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="mt-6">
                        <nav class="grid gap-y-8">
                            <a href="{{ route('projects.identity') }}" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-700 space-x-3 transition ease-in-out duration-200">
                                @svg('fluent-paint-bucket', 'shrink-0 h-7 w-7 text-amber-500')
                                <span class="text-base font-medium text-gray-200">
                                    All-new Visual Identity
                                </span>
                            </a>

                            <a href="{{ route('projects.website') }}" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-700 space-x-3 transition ease-in-out duration-200">
                                @svg('fluent-app-generic', 'shrink-0 h-7 w-7 text-amber-500')
                                <span class="text-base font-medium text-gray-200">
                                    Brand-new Website
                                </span>
                            </a>

                            <a href="{{ route('projects.support') }}" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-700 space-x-3 transition ease-in-out duration-200">
                                @svg('fluent-chat-bubbles-help', 'shrink-0 h-7 w-7 text-amber-500')
                                <span class="text-base font-medium text-gray-200">
                                    Support Changes
                                </span>
                            </a>

                            <a href="{{ route('projects.docs') }}" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-700 space-x-3 transition ease-in-out duration-200">
                                @svg('fluent-class', 'shrink-0 h-7 w-7 text-amber-500')
                                <span class="text-base font-medium text-gray-200">
                                    Re-written Nova docs
                                </span>
                            </a>

                            <a href="{{ route('projects.exchange') }}" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-700 space-x-3 transition ease-in-out duration-200">
                                @svg('fluent-apps-add-in', 'shrink-0 h-7 w-7 text-amber-500')
                                <span class="text-base font-medium text-gray-200">
                                    The Nova Exchange
                                </span>
                            </a>

                            <a href="{{ route('projects.galaxy') }}" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-700 space-x-3 transition ease-in-out duration-200">
                                @svg('fluent-rocket', 'shrink-0 h-7 w-7 text-amber-500')
                                <span class="text-base font-medium text-gray-200">
                                    Secret Project
                                </span>
                            </a>
                        </nav>
                    </div>
                </div>
                {{-- <div class="py-6 px-5 space-y-6">
                    <div class="grid grid-cols-2 gap-y-4 gap-x-8">
                        <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                            Pricing
                        </a>

                        <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                            Docs
                        </a>

                        <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                            Enterprise
                        </a>

                        <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                            Blog
                        </a>

                        <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                            Help Center
                        </a>

                        <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                            Guides
                        </a>

                        <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                            Security
                        </a>

                        <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">
                            Events
                        </a>
                    </div>
                    <div>
                        <a href="#" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-amber-600 hover:bg-amber-700">
                            Sign up
                        </a>
                        <p class="mt-6 text-center text-base font-medium text-gray-500">
                            Existing customer?
                            <a href="#" class="text-amber-600 hover:text-amber-500">
                                Sign in
                            </a>
                        </p>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="relative mt-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 xl:max-w-5xl">
            <main>
                <article>
                    <header class="pt-6 xl:pb-10">
                        <div class="space-y-1 text-center">
                            <h1 class="text-3xl leading-9 font-extrabold text-spanish-roast tracking-tight sm:text-4xl sm:leading-10 md:text-5xl md:leading-14">{{ $title }}</h1>
                        </div>
                    </header>

                    <div class="pb-16 xl:pb-20">
                        <div class="{{ $prose ? 'prose prose-lg ' : '' }}pt-10 pb-8 text-gray-700">
                            {{ $slot }}
                        </div>
                    </div>
                </article>
            </main>
        </div>
    </div>

    <x-footer class="max-w-3xl xl:max-w-5xl" />
</x-base-layout>