<x-layouts.galaxy>
    <header class="relative w-full h-96 py-32 bg-gray-800">
        <div class="max-w-6xl mx-auto space-y-10">
            <div class="flex items-center space-x-4">
                <x-logos.galaxy color="amber-500" class="w-auto h-24" />
                <h1 class="text-4xl sm:text-6xl lg:text-7xl leading-none font-extrabold tracking-tight text-white">Welcome to the Galaxy</h1>
            </div>

            <p class="max-w-screen-lg text-lg sm:text-2xl sm:leading-10 font-medium mb-10 sm:mb-11"><code class="font-mono text-amber-500 font-bold ">Explore</code> and <code class="font-mono text-amber-500 font-bold ">discover</code> new and exciting games around the world.</p>
        </div>
    </header>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path class="text-gray-800" fill="currentColor" fill-opacity="1" d="M0,96L120,85.3C240,75,480,53,720,48C960,43,1200,53,1320,58.7L1440,64L1440,0L1320,0C1200,0,960,0,720,0C480,0,240,0,120,0L0,0Z"></path></svg>

    <section class="max-w-screen-lg xl:max-w-screen-xl mx-auto space-y-20 -mt-40">
        <div>
            <h2 class="text-2xl sm:text-3xl lg:text-4xl leading-none font-extrabold text-gray-900 tracking-tight mb-8">
                Recommended
            </h2>

            <div class="space-y-6">
                <div class="grid gap-x-6 gap-y-12 max-w-lg mx-auto md:grid-cols-2 xl:grid-cols-3 md:max-w-none">
                    <x-card :image="asset('images/brian-mcgowan-DsYv1KJHrlE-unsplash.jpg')">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-amber-500 uppercase tracking-wide">
                            Star Trek: DS9
                        </span>

                        <div class="mt-1 font-extrabold text-gray-900 tracking-tight text-2xl">USS Nimitz</div>

                        <div class="mt-1 text-gray-500 text-sm leading-6">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu</div>

                        <div class="mt-4 space-y-3">
                            <div class="flex items-center space-x-4">
                                @svg('fluent-people-community', 'h-7 w-7 text-gray-400')
                                <span>Obsidian Fleet</span>
                            </div>

                            <div class="flex items-center space-x-4">
                                @svg('fluent-comment-multiple', 'h-7 w-7 text-gray-400')
                                <a href="#" target="_blank" class="hover:text-pink-500 transition-all ease-in-out duration-150">https://discord.gg/abc123</a>
                            </div>

                            <div class="flex items-center space-x-4">
                                @svg('fluent-info', 'h-7 w-7 text-gray-400')
                                <a href="#" target="_blank" class="hover:text-pink-500 transition-all ease-in-out duration-150">Learn more</a>
                            </div>
                        </div>
                    </x-card>

                    <x-card :image="asset('images/brian-mcgowan-DsYv1KJHrlE-unsplash.jpg')">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 text-amber-500 uppercase tracking-wide">
                            Star Trek: DS9
                        </span>

                        <div class="mt-1 font-extrabold text-gray-900 tracking-tight text-2xl">USS Nimitz</div>

                        <div class="mt-1 text-gray-500 text-sm leading-6">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu</div>

                        <div class="mt-4 space-y-3">
                            <div class="flex items-center space-x-4">
                                @svg('fluent-people-community', 'h-7 w-7 text-gray-400')
                                <span>Obsidian Fleet</span>
                            </div>

                            <div class="flex items-center space-x-4">
                                @svg('fluent-comment-multiple', 'h-7 w-7 text-gray-400')
                                <a href="#" target="_blank" class="hover:text-pink-500 transition-all ease-in-out duration-150">https://discord.gg/abc123</a>
                            </div>

                            <div class="flex items-center space-x-4">
                                @svg('fluent-info', 'h-7 w-7 text-gray-400')
                                <a href="#" target="_blank" class="hover:text-pink-500 transition-all ease-in-out duration-150">Learn more</a>
                            </div>
                        </div>
                    </x-card>
                </div>
            </div>
        </div>
    </section>
</x-layouts.galaxy>