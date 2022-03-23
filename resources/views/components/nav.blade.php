@props([
    'bgColor' => 'gray-100',
    'textColor' => 'gray-500',
])

<div id="sidebar" class="fixed z-40 inset-0 flex-none h-full bg-black bg-opacity-25 w-full lg:bg-{{ $bgColor }} lg:static lg:h-auto lg:overflow-y-visible lg:pt-0 lg:w-60 xl:w-72 lg:block hidden">
    <div id="navWrapper" class="h-full overflow-y-auto scrolling-touch lg:h-auto lg:block lg:sticky lg:bg-transparent overflow-hidden lg:top-18 bg-{{ $bgColor }} mr-24 lg:mr-0">
        <div class="hidden lg:block h-12 pointer-events-none absolute inset-x-0 z-10 bg-gradient-to-b from-{{ $bgColor }}"></div>

        <nav id="nav" class="px-1 pt-6 overflow-y-auto font-medium text-base sm:px-3 xl:px-5 lg:text-sm pb-10 lg:pt-10 lg:pb-16 space-y-8">
            <div>
                <ul>
                    <li>
                        <a
                            href="{{ route('docs') }}"
                            class="group px-3 py-2 transition ease-in-out duration-200 relative flex items-center hover:text-amber-500 text-{{ $textColor }}"
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
                                class="group px-3 py-2 transition-colors duration-200 relative flex items-center hover:text-amber-500 text-{{ $textColor }}"
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
                    @endif

                    @if (config('services.anodyne.galaxy'))
                        <li>
                            <a
                                href="{{ route('galaxy.index') }}"
                                class="group px-3 py-2 transition-colors duration-200 relative flex items-center hover:text-amber-500 text-{{ $textColor }}"
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
                            class="group px-3 py-2 transition-colors duration-200 relative flex items-center hover:text-amber-500 text-{{ $textColor }}"
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
            </div>

            {{ $slot }}
        </nav>
    </div>
</div>