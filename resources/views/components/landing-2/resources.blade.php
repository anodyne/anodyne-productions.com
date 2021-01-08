<div class="relative bg-white pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
    <div class="relative max-w-7xl mx-auto">
        <div class="text-center">
            <a name="resources"></a>
            <h2 class="text-base text-light-blue-600 font-semibold tracking-wide uppercase">Learn</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                Helpful Resources
            </p>
            {{-- <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed.
            </p> --}}
        </div>

        <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-{{ config('services.anodyne.exchange') ? '3' : '2' }} lg:max-w-none">
            <div class="flex flex-col rounded-lg shadow-lg ring-1 ring-gray-100 overflow-hidden">
                <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                    <div class="flex-1">
                        <div class="text-xs text-gray-400 uppercase tracking-wide font-semibold">Documentation</div>
                        <a href="{{ route('docs') }}" class="block mt-2">
                            <p class="text-xl font-semibold text-gray-900">
                                Learn all about Nova 2
                            </p>
                            <p class="mt-3 text-base text-gray-500">
                                Nova's documentation has been re-written to be clearer and more helpful than before. We've added all-new sections about getting started, added pages to explain complex features, and dug deeper into the core of Nova to help users understand how to get the most out Nova 2.
                            </p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex flex-col rounded-lg shadow-lg ring-1 ring-gray-100 overflow-hidden">
                <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                    <div class="flex-1">
                        <div class="text-xs text-gray-400 uppercase tracking-wide font-semibold">Community</div>
                        <a href="https://discord.gg/7WmKUks" target="_blank" class="block mt-2">
                            <p class="text-xl font-semibold text-gray-900">
                                Join the community
                            </p>
                            <p class="mt-3 text-base text-gray-500">
                                Over the years Nova has fostered a global community of artists, developers, and writers who are passionate about the stories they tell. No matter if you're looking to chat with people, find a new game, or get help with Nova, the Anodyne community is ready to welcome you.
                            </p>
                        </a>
                    </div>
                </div>
            </div>

            @if (config('services.anodyne.exchange'))
                <div class="flex flex-col rounded-lg shadow-lg ring-1 ring-gray-100 overflow-hidden">
                    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <div class="text-xs text-gray-400 uppercase tracking-wide font-semibold">Exchange</div>
                            <a href="{{ route('exchange.index') }}" class="block mt-2">
                                <p class="text-xl font-semibold text-gray-900">
                                    Make Nova your own
                                </p>
                                <p class="mt-3 text-base text-gray-500">
                                    Nova provides immense flexibility to truly make your game stand out.  Whether you're trying to change the way it looks with a new theme or rank set or even update how it works with an extension, the talented community artisans on the Nova Exchange have you covered.
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>