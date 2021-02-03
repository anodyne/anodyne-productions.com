<x-base-layout>
    <div class="sticky top-0 z-40 lg:z-50 w-full max-w-8xl mx-auto bg-gray-100 flex-none flex">
        <div class="flex-none pl-4 sm:pl-6 xl:pl-8 flex items-center border-b border-gray-200 lg:border-b-0 lg:w-60 xl:w-72">
            <a class="overflow-hidden w-10 md:w-auto" href="{{ route('home') }}">
                <span class="sr-only">Anodyne home page</span>
                <x-logos.anodyne class="w-3/4 h-auto" gradient />
            </a>
        </div>

        <div class="flex-auto border-b border-gray-200 h-18 flex items-center justify-between px-4 sm:px-6 lg:mx-6 lg:px-0 xl:mx-8">
            <button type="button" class="group leading-6 font-medium flex items-center space-x-3 sm:space-x-4 hover:text-gray-600 transition-colors duration-200">
                <svg width="24" height="24" fill="none" class="text-gray-400 group-hover:text-gray-500 transition-colors duration-200"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                <span>Quick search<span class="hidden sm:inline"> for anything</span></span>
                <span class="hidden sm:block text-gray-400 text-sm leading-5 py-0.5 px-1.5 border border-gray-300 rounded-md"><span class="sr-only">Press </span><kbd class="font-sans"><abbr title="Command" class="no-underline">⌘</abbr></kbd><span class="sr-only"> and </span><kbd class="font-sans">K</kbd><span class="sr-only"> to search</span></span>
            </button>

            <div class="flex items-center space-x-6">
                <a href="https://github.com/anodyne/nova3" class="text-gray-400 hover:text-gray-500 transition-colors duration-200">
                    <span class="sr-only">Nova on GitHub</span>
                    <x-logos.github />
                </a>
            </div>
        </div>
    </div>

    <div class="w-full max-w-8xl mx-auto">
        {{ $slot }}
    </div>
</x-base-layout>