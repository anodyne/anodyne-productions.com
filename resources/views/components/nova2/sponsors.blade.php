@props(['sponsors'])

<div>
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
        <div class="lg:grid lg:grid-cols-2 lg:gap-8">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Thanks to our incredible sponsors
                </h2>
                <p class="mt-3 max-w-3xl text-lg text-gray-500">
                    We've launched a Patreon as a way for people to support Anodyne and help us continue to provide Nova and all of its resources to the community for free. As a patron, you'll have access to a private Discord community, early access to Nova 3, regular updates on Anodyne's products and services, and more. Join today!
                </p>
                <div class="mt-8 sm:flex">
                    <div class="rounded-lg shadow">
                        <a href="https://patreon.com/anodyneproductions" target="_blank" class="group bg-spanish-roast text-white hover:text-amber-500 rounded-lg shadow px-6 py-3 inline-flex items-center justify-center space-x-2 text-base font-semibold w-full lg:w-auto transition">
                            <span>Become a patron</span>
                            @svg('plump-s-arrow-right-circle', 'h-6 w-6 text-white/50 group-hover:text-amber-500 transition')
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-8 grid sm:grid-cols-2 gap-6 sm:gap-y-8 lg:gap-x-8">
            @foreach ($sponsors as $sponsor)
                <a href="{{ $sponsor['link'] }}" target="_blank" class="group relative bg-white rounded-lg shadow-md overflow-hidden ring-1 ring-black ring-opacity-5">
                    <figure>
                        <div class="relative bg-gray-100 pt-[50%] overflow-hidden">
                            <div class="absolute inset-0 w-full h-full rounded-t-lg overflow-hidden group-hover:blur-[6px] transition-all duration-300">
                                <img src="{{ $sponsor['image'] }}" alt="{{ $sponsor['name'] }} logo" class="absolute inset-0 w-auto h-full mx-auto py-2">
                            </div>
                            <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 absolute z-10 inset-0 flex items-center justify-center text-sm {{ $sponsor['hoverColor'] === 'dark' ? 'text-gray-900' : 'text-white' }} font-medium">
                                Visit site
                                @svg('plump-s-link-square', 'h-4 w-4 ml-2')
                            </div>
                        </div>
                        <figcaption class="py-3 px-4">
                            <p class="text-sm font-medium text-gray-900 mb-1">
                                {{ $sponsor['name'] }}
                            </p>
                            <p class="text-xs font-medium text-gray-500">{{ $sponsor['level'] }}</p>
                        </figcaption>
                    </figure>
                </a>
            @endforeach
            </div>
        </div>
    </div>
</div>