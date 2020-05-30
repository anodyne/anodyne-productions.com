<div class="bg-gray-800 pb-32">
    <nav x-data="{ open: false }" @keydown.window.escape="open = false" class="bg-gray-800">
        <div class="max-w-6xl mx-auto | sm:px-6 lg:px-8">
            <div class="border-b border-gray-700">
                <div class="flex items-center justify-between h-16 px-4 | sm:px-0">
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="flex-shrink-0">
                            <x-logo-anodyne class="h-8 w-auto text-white" />
                        </a>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline">
                                @auth
                                    <a href="{{ route('account.info') }}" class="ml-4 px-3 py-2 rounded-md text-sm font-medium focus:outline-none first:ml-0 @if (Request::is('account*')) text-white bg-gray-900 focus:text-white focus:bg-gray-700 @else text-gray-300 hover:text-white hover:bg-gray-700 focus:text-white focus:bg-gray-700 @endif">Account</a>
                                @endauth

                                <a href="{{ route('xtras.index') }}" class="ml-4 px-3 py-2 rounded-md text-sm font-medium focus:outline-none first:ml-0 @if (Request::is('xtras*')) text-white bg-gray-900 focus:text-white focus:bg-gray-700 @else text-gray-300 hover:text-white hover:bg-gray-700 focus:text-white focus:bg-gray-700 @endif">Xtras</a>

                                <a href="{{ route('support.index') }}" class="ml-4 px-3 py-2 rounded-md text-sm font-medium focus:outline-none first:ml-0 @if (Request::is('support*')) text-white bg-gray-900 focus:text-white focus:bg-gray-700 @else text-gray-300 hover:text-white hover:bg-gray-700 focus:text-white focus:bg-gray-700 @endif">Support</a>

                                <a href="{{ route('docs.root') }}" class="ml-4 px-3 py-2 rounded-md text-sm font-medium focus:outline-none first:ml-0 @if (Request::is('docs*')) text-white bg-gray-900 focus:text-white focus:bg-gray-700 @else text-gray-300 hover:text-white hover:bg-gray-700 focus:text-white focus:bg-gray-700 @endif">Docs</a>

                                @auth
                                    <a href="#" class="ml-4 px-3 py-2 rounded-md text-sm font-medium focus:outline-none first:ml-0 @if (Request::is('admin*')) text-white bg-gray-900 focus:text-white focus:bg-gray-700 @else text-gray-300 hover:text-white hover:bg-gray-700 focus:text-white focus:bg-gray-700 @endif">Admin</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                    <div class="hidden | md:block">
                        <div class="ml-4 flex items-center | md:ml-6">
                            <x-user-menu />
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:text-white">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div :class="{ 'block': open, 'hidden': !open }" class="hidden border-b border-gray-700 | md:hidden">
            <div class="px-2 py-3 sm:px-3">
                @auth
                    <a href="{{ route('account.info') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Account</a>
                @endauth

                <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Xtras</a>
                <a href="{{ route('support.index') }}" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-white bg-gray-900 focus:outline-none focus:text-white focus:bg-gray-700">Support</a>
                <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Docs</a>

                @auth
                    <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Admin</a>
                @endauth
            </div>

            @auth
                <div class="pt-4 pb-3 border-t border-gray-700">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium leading-none text-white">Tom Cook</div>
                            <div class="mt-1 text-sm font-medium leading-none text-gray-400">tom@example.com</div>
                        </div>
                    </div>
                    <div class="mt-3 px-2">
                        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Your Profile</a>
                        <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Settings</a>
                        <a href="#" class="mt-1 block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:text-white focus:bg-gray-700">Sign out</a>
                    </div>
                </div>
            @endauth
        </div>
    </nav>

    <header class="py-10">
        <div class="max-w-6xl mx-auto px-4 | sm:px-6 lg:px-8">
            <div class="lg:flex lg:items-center lg:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="flex items-center text-2xl font-bold leading-7 text-white | sm:text-3xl sm:leading-9 sm:truncate">
                        {{ $slot }}
                    </h2>
                </div>

                {{ $controls ?? false }}
            </div>
        </div>
    </header>
</div>