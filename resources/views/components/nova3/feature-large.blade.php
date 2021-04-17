@props([
    'icon',
    'title',
    'image',
    'right' => false,
])

<div class="relative">
    <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-24">
        <div class="px-4 max-w-xl mx-auto sm:px-6 lg:py-16 lg:max-w-none lg:mx-0 lg:px-0 {{ $right ? 'lg:col-start-2' : '' }}">
            <div>
                <div>
                    <span class="squircle w-16 h-16 flex items-center justify-center bg-gradient-to-r from-orange-500 to-amber-500">
                        @svg($icon, 'h-10 w-10 text-white')
                    </span>
                </div>
                <div class="mt-6 space-y-4">
                    <h2 class="text-3xl md:text-4xl font-extrabold tracking-tight text-white">
                        {{ $title }}
                    </h2>
                    <div>
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-12 sm:mt-16 lg:mt-0 {{ $right ? 'lg:col-start-1' : '' }}">
            <div class="lg:px-0 lg:m-0 lg:relative lg:h-full {{ $right ? 'pr-4 -ml-48 sm:pr-6 md:-ml-16' : 'pl-4 -mr-48 sm:pl-6 md:-mr-16' }}">
                <img class="w-full rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 lg:absolute {{ $right ? 'lg:right-0' : 'lg:left-0' }} lg:h-full lg:w-auto lg:max-w-none" src="{{ $image }}" alt="screenshot">
            </div>
        </div>
    </div>
</div>