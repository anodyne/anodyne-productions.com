<div id="sidebar" class="fixed z-40 inset-0 flex-none h-full bg-black bg-opacity-25 w-full lg:bg-gray-100 lg:static lg:h-auto lg:overflow-y-visible lg:pt-0 lg:w-60 xl:w-72 lg:block hidden">
    <div id="navWrapper" class="h-full overflow-y-auto scrolling-touch lg:h-auto lg:block lg:sticky lg:bg-transparent overflow-hidden lg:top-18 bg-gray-100 mr-24 lg:mr-0">
        <div class="hidden lg:block h-12 pointer-events-none absolute inset-x-0 z-10 bg-gradient-to-b from-gray-100"></div>

        <nav id="nav" class="px-1 pt-6 overflow-y-auto font-medium text-base sm:px-3 xl:px-5 lg:text-sm pb-10 lg:pt-10 lg:pb-16 space-y-8">
            <div>
                <ul>
                    <li>
                        <a
                            href="{{ route('docs') }}"
                            class="group px-3 py-2 transition ease-in-out duration-200 relative flex items-center hover:text-teal-500 text-gray-500"
                            aria-current="page"
                        >
                            <div class="group relative flex items-center space-x-3">
                                @svg('fluent-class', 'flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-teal-400 transition ease-in-out duration-150')

                                <span class="truncate">
                                    Documentation
                                </span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a
                            href="{{ route('marketplace') }}"
                            class="group px-3 py-2 transition-colors duration-200 relative flex items-center hover:text-purple-600 text-gray-500"
                            aria-current="page"
                        >
                            <div class="group relative flex items-center space-x-3">
                                @svg('fluent-apps-add-in', 'flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-purple-500 transition ease-in-out duration-150')

                                <span class="truncate">
                                    Marketplace
                                </span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a
                            href="https://discord.gg/7WmKUks"
                            target="_blank"
                            class="group px-3 py-2 transition-colors duration-200 relative flex items-center hover:text-orange-500 text-gray-500"
                            aria-current="page"
                        >
                            <div class="group relative flex items-center space-x-3">
                                @svg('fluent-chat-bubbles-help', 'flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-orange-400 transition ease-in-out duration-150')

                                <span class="truncate">
                                    Get Help
                                </span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>

            {{ $slot }}
        </nav>
    </div>
</div>