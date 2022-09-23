<li class="mt-10 first:mt-0 md:mt-0">
    <div class="flex">
        <div class="shrink-0">
            <div class="flex items-center justify-center h-12 w-12 rounded-xl bg-gradient-to-{{ $gradientDirection }} from-{{ $gradientStart }} to-{{ $gradientStop }} text-white">
                @svg($icon, 'h-8 w-8')
            </div>
        </div>
        <div class="ml-4">
            <h4 class="text-lg font-medium text-{{ $color }}">{{ $title }}</h4>
            <p class="mt-2 text-base">
                {{ $slot }}
            </p>
        </div>
    </div>
</li>