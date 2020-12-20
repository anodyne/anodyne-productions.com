<section {{ $attributes->only('id') }}>
    <div class="px-4 sm:px-6 md:px-8 mb-10 sm:mb-16 md:mb-20">
        @isset($icon)
            <div class="w-16 h-16 rounded-xl mb-8 bg-gradient-to-{{ $gradientDirection }} flex items-center justify-center from-{{ $gradientStart }} to-{{ $gradientStop }}">
                @svg($icon, 'h-12 w-12 text-white')
            </div>
        @endisset

        @isset ($heading)
            <h2 class="sm:text-lg sm:leading-snug font-semibold tracking-wide uppercase text-{{ $color }} mb-3">
                {{ $heading }}
            </h2>
        @endisset

        @isset($title)
            <p class="text-3xl sm:text-5xl lg:text-6xl leading-none font-extrabold text-gray-900 tracking-tight mb-8">
                {{ $title }}
            </p>
        @endisset

        @isset($content)
            <p class="max-w-4xl text-lg sm:text-2xl font-medium sm:leading-10 space-y-6 mb-6">
                {{ $content }}
            </p>
        @endisset
    </div>

    <div class="relative py-3">
        {{ $slot }}
    </div>
</section>