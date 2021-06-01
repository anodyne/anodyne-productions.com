@props([
    'textColor' => 'gray-400',
    'hoverColor' => 'gray-500',
])

<footer>
    <div {{ $attributes->merge(['class' => 'max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 md:flex md:items-center md:justify-between']) }}>
        <div class="flex items-center justify-center space-x-6 md:order-2">
            <a href="https://facebook.com/anodyneproductions" target="_blank" class="text-{{ $textColor }} hover:text-{{ $hoverColor }} transition-all ease-in-out duration-200">
                <span class="sr-only">Facebook</span>
                <x-logos.facebook class="h-8 w-8 md:h-6 md:w-6" />
            </a>

            <a href="https://twitter.com/anodyneprod" target="_blank" class="text-{{ $textColor }} hover:text-{{ $hoverColor }} transition-all ease-in-out duration-200">
                <span class="sr-only">Twitter</span>
                <x-logos.twitter class="h-8 w-8 md:h-6 md:w-6" />
            </a>

            <a href="https://github.com/anodyne" target="_blank" class="text-{{ $textColor }} hover:text-{{ $hoverColor }} transition-all ease-in-out duration-200">
                <span class="sr-only">GitHub</span>
                <x-logos.github class="h-8 w-8 md:h-5 md:w-5" />
            </a>

            <a href="https://discord.gg/7WmKUks" target="_blank" class="text-{{ $textColor }} hover:text-{{ $hoverColor }} transition-all ease-in-out duration-200">
                <span class="sr-only">Discord</span>
                <x-logos.discord class="h-8 md:h-4 w-auto" />
            </a>

            <a href="https://patreon.com/anodyneproductions" target="_blank" class="text-{{ $textColor }} hover:text-{{ $hoverColor }} transition-all ease-in-out duration-200">
                <span class="sr-only">Patreon</span>
                <x-logos.patreon class="h-6 md:h-4 w-auto" />
            </a>
        </div>
        <div class="mt-8 md:mt-0 md:order-1">
            <div class="flex flex-col md:flex-row items-center justify-center md:justify-start">
                <a href="{{ route('home') }}">
                    <x-logos.anodyne :logo-color="$textColor" :text-color="$textColor" class="h-6 w-auto" />
                </a>
            </div>
        </div>
    </div>
</footer>