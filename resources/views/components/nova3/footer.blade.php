<footer>
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
        <div class="flex items-center justify-center space-x-6 md:order-2">
            <a href="https://facebook.com/anodyneproductions" target="_blank" class="text-gray-500 hover:text-gray-400 transition-all ease-in-out duration-200">
                <span class="sr-only">Facebook</span>
                <x-logos.facebook class="h-8 w-8 md:h-6 md:w-6" />
            </a>

            <a href="https://twitter.com/anodyneprod" target="_blank" class="text-gray-500 hover:text-gray-400 transition-all ease-in-out duration-200">
                <span class="sr-only">Twitter</span>
                <x-logos.twitter class="h-8 w-8 md:h-6 md:w-6" />
            </a>

            <a href="https://github.com/anodyne" target="_blank" class="text-gray-500 hover:text-gray-400 transition-all ease-in-out duration-200">
                <span class="sr-only">GitHub</span>
                <x-logos.github class="h-8 w-8 md:h-6 md:w-6" />
            </a>

            <a href="https://discord.gg/7WmKUks" target="_blank" class="text-gray-500 hover:text-gray-400 transition-all ease-in-out duration-200">
                <span class="sr-only">Discord</span>
                <x-logos.discord class="h-8 md:h-6 w-auto" />
            </a>

            <a href="https://patreon.com/anodyneproductions" target="_blank" class="text-gray-500 hover:text-gray-400 transition-all ease-in-out duration-200">
                <span class="sr-only">Patreon</span>
                <x-logos.patreon class="h-6 md:h-4 w-auto" />
            </a>
        </div>
        <div class="md:order-1">
            <div class="flex flex-col md:flex-row items-center justify-center md:justify-start space-y-8 md:space-y-0 md:space-x-4">
                <x-logos.anodyne-mark color="gray-600" class="hidden md:block h-6 w-auto" />

                <p class="text-center text-base text-gray-500">
                    &copy; {{ date('Y') }} Anodyne Productions. All rights reserved.
                </p>

                <x-logos.anodyne logo-color="gray-600" text-color="gray-600" class="block md:hidden h-6 w-auto" />
            </div>
        </div>
    </div>
</footer>