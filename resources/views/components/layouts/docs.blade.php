<x-layouts.base>
    <div class="sticky top-0 z-40 lg:z-50 w-full max-w-8xl mx-auto bg-gray-100 flex-none flex">
        <div class="flex-none pl-4 sm:pl-6 xl:pl-8 flex items-center border-b border-gray-200 lg:border-b-0 lg:w-60 xl:w-72">
            <a class="overflow-hidden w-10 md:w-auto" href="/">
                <span class="sr-only">Anodyne home page</span>
                <x-logos.anodyne class="w-auto h-6" />
            </a>
        </div>

        <div class="flex-auto border-b border-gray-200 h-18 flex items-center justify-between px-4 sm:px-6 lg:mx-6 lg:px-0 xl:mx-8">
            <button type="button" class="group leading-6 font-medium flex items-center space-x-3 sm:space-x-4 hover:text-gray-600 transition-colors duration-200">
                <svg width="24" height="24" fill="none" class="text-gray-400 group-hover:text-gray-500 transition-colors duration-200"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                <span>Quick search<span class="hidden sm:inline"> for anything</span></span>
                <span class="hidden sm:block text-gray-400 text-sm leading-5 py-0.5 px-1.5 border border-gray-300 rounded-md"><span class="sr-only">Press </span><kbd class="font-sans"><abbr title="Command" class="no-underline">⌘</abbr></kbd><span class="sr-only"> and </span><kbd class="font-sans">K</kbd><span class="sr-only"> to search</span></span>
            </button>

            <div class="flex items-center space-x-6 flex-shrink-0">
                <x-dropdown placement="bottom-end" width="40">
                    <x-slot name="trigger">
                        <span>v{{ request()->route()->version }}</span>
                        <svg class="-mr-1 ml-2 h-5 w-5" fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"></path></svg>
                    </x-slot>

                    <x-dropdown.group>
                        @foreach (['3.0', '2.6'] as $version)
                            <x-dropdown.item :href="route('docs', [$version])">v{{ $version }}</x-dropdown.item>
                        @endforeach
                    </x-dropdown.group>
                </x-dropdown>

                <a href="https://github.com/anodyne/nova3" class="text-gray-400 hover:text-gray-500 transition-colors duration-200">
                    <span class="sr-only">Nova on GitHub</span>
                    <x-logos.github />
                </a>
            </div>
        </div>
    </div>

    <div class="w-full max-w-8xl mx-auto">
        <div class="lg:flex">
            {{ $slot }}
        </div>
    </div>
</x-layouts.base>