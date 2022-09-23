<footer>
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
        <div class="flex items-center justify-center space-x-6 md:order-2">
            <a href="https://facebook.com/anodyneproductions" target="_blank" class="text-gray-400 hover:text-gray-500 transition-all ease-in-out duration-200">
                <span class="sr-only">Facebook</span>
                <x-logos.facebook class="h-6 w-6" />
            </a>

            <a href="https://twitter.com/anodyneprod" target="_blank" class="text-gray-400 hover:text-gray-500 transition-all ease-in-out duration-200">
                <span class="sr-only">Twitter</span>
                <x-logos.twitter class="h-6 w-6" />
            </a>

            <a href="https://github.com/anodyne" target="_blank" class="text-gray-400 hover:text-gray-500 transition-all ease-in-out duration-200">
                <span class="sr-only">GitHub</span>
                <x-logos.github class="h-6 w-6" />
            </a>

            <a href="https://discord.gg/7WmKUks" target="_blank" class="text-gray-400 hover:text-gray-500 transition-all ease-in-out duration-200">
                <span class="sr-only">Discord</span>
                <x-logos.discord class="h-6 w-auto" />
            </a>

            <a href="https://patreon.com/anodyneproductions" target="_blank" class="text-gray-400 hover:text-gray-500 transition-all ease-in-out duration-200">
                <span class="sr-only">Patreon</span>
                <x-logos.patreon class="h-4 w-auto" />
            </a>
        </div>
        <div class="mt-8 md:mt-0 md:order-1">
            <p class="flex items-center justify-center md:justify-start space-x-4 text-center text-base text-gray-400">
                <x-logos.anodyne-mark class="h-6 w-auto" color="gray-300" />
                <span>&copy; {{ date('Y') }} Anodyne Productions. All rights reserved.</span>
            </p>
        </div>
    </div>
</footer>