<x-layouts.landing>
    <header class="relative z-10 max-w-screen-lg mx-auto | xl:max-w-screen-xl">
        <div class="px-4 sm:px-6 md:px-8 mb-14 sm:mb-20 xl:mb-8">
            <div class="border-b border-gray-200 py-6 flex items-center justify-between mb-16 -mx-4 px-4 | sm:mb-20 sm:mx-0 sm:px-0">
                <button type="button" class="group leading-6 font-medium flex items-center space-x-3 sm:space-x-4 hover:text-gray-600 transition-colors duration-200">
                    <svg width="24" height="24" fill="none" class="text-gray-400 group-hover:text-gray-500 transition-colors duration-200"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    <span>Quick search<span class="hidden sm:inline"> for anything</span></span>
                    <span class="hidden sm:block text-gray-400 text-sm leading-5 py-0.5 px-1.5 border border-gray-300 rounded-xl">
                        <span class="sr-only">Press </span>
                        <kbd class="font-sans"><abbr title="Command" class="no-underline">⌘</abbr></kbd>
                        <span class="sr-only"> and </span>
                        <kbd class="font-sans">K</kbd>
                        <span class="sr-only"> to search</span>
                    </span>
                </button>

                <div class="flex space-x-6 sm:space-x-10">
                    <a class="text-base leading-6 font-medium hover:text-gray-600 transition-colors duration-200" href="/docs">
                        <span class="sm:hidden">Docs</span>
                        <span class="hidden sm:inline">Documentation</span>
                    </a>
                    <a href="https://github.com/anodyne/nova3" class="text-gray-400 hover:text-gray-500 transition-colors duration-200">
                        <span class="sr-only">Nova on GitHub</span>
                        <x-logos.github />
                    </a>
                </div>
            </div>

            <x-logos.anodyne class="w-auto h-7 sm:h-8" />

            <h1 class="text-4xl sm:text-6xl lg:text-7xl leading-none font-extrabold tracking-tight text-gray-900 mt-10 mb-8 sm:mt-14 sm:mb-10">Rapidly build modern websites without ever leaving your HTML.</h1>

            <p class="max-w-screen-lg text-lg sm:text-2xl sm:leading-10 font-medium mb-10 sm:mb-11">A utility-first CSS framework packed with classes like <code class="font-mono text-gray-900 font-bold ">flex</code>,<!-- --> <code class="font-mono text-gray-900 font-bold ">pt-4</code>, <code class="font-mono text-gray-900 font-bold ">text-center</code> and<!-- --> <code class="font-mono text-gray-900 font-bold ">rotate-90</code> that can be composed to build any design, directly in your markup.</p>

            <div class="flex flex-wrap space-y-4 sm:space-y-0 sm:space-x-4 text-center">
                <a class="w-full sm:w-auto flex-none bg-gray-900 hover:bg-gray-700 text-white text-lg leading-6 font-semibold py-3 px-6 border border-transparent rounded-xl focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-900 focus:outline-none transition-colors duration-200" href="/docs">Get started</a>

                <button type="button" class="w-full sm:w-auto flex-none bg-gray-50 text-gray-400 hover:text-gray-900 font-mono leading-6 py-3 sm:px-6 border border-gray-200 rounded-xl flex items-center justify-center space-x-2 sm:space-x-4 focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-300 focus:outline-none transition-colors duration-200">
                    <span class="text-gray-900">
                        <span class="hidden sm:inline text-gray-500" aria-hidden="true">$<!-- --> </span>
                        npm install tailwindcss
                    </span>
                    <span class="sr-only">(click to copy to clipboard)</span>
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M8 16c0 1.886 0 2.828.586 3.414C9.172 20 10.114 20 12 20h4c1.886 0 2.828 0 3.414-.586C20 18.828 20 17.886 20 16v-4c0-1.886 0-2.828-.586-3.414C18.828 8 17.886 8 16 8m-8 8h4c1.886 0 2.828 0 3.414-.586C16 14.828 16 13.886 16 12V8m-8 8c-1.886 0-2.828 0-3.414-.586C4 14.828 4 13.886 4 12V8c0-1.886 0-2.828.586-3.414C5.172 4 6.114 4 8 4h4c1.886 0 2.828 0 3.414.586C16 5.172 16 6.114 16 8"></path></svg>
                </button>
            </div>
        </div>
    </header>

    <section class="max-w-screen-lg xl:max-w-screen-xl mx-auto space-y-20 sm:space-y-32 md:space-y-40 lg:space-y-44">
        <x-landing.mobile-first />

        <x-landing.stories rotate="-6" />

        <x-landing.pages rotate="6" />

        <x-landing.ranks rotate="-6" />

        <x-landing.applications rotate="6" />

        <x-landing.everything rotate="-6" />
    </section>
</x-layouts.landing>