<x-base-layout>
    <div class="space-y-20 sm:space-y-32 md:space-y-40 lg:space-y-44 overflow-hidden">
        {{ $slot }}

        <footer class="bg-gray-50 pt-16 pb-12 sm:pt-20 sm:pb-20 md:pt-24 xl:pt-32">
            <div class="max-w-screen-lg xl:max-w-screen-xl mx-auto divide-y divide-gray-200 px-4 sm:px-6 md:px-8 ">
                <ul class="text-sm font-medium pb-14 sm:pb-20 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-10">
                    <li class="space-y-5 row-span-2">
                        <h2 class="text-xs font-semibold tracking-wide text-gray-900 uppercase">Getting started</h2>
                        <ul class="space-y-4">
                            <li><a href="#" class="transition-colors duration-200 hover:text-gray-900">Installation</a></li>
                            <li><a href="#" class="transition-colors duration-200 hover:text-gray-900">Release Notes</a></li>
                            <li><a href="#" class="transition-colors duration-200 hover:text-gray-900">Upgrade Guide</a></li>
                            <li><a href="#" class="transition-colors duration-200 hover:text-gray-900">Browser Support</a></li>
                        </ul>
                    </li>
                    <li class="space-y-5 row-span-2">
                        <h2 class="text-xs font-semibold tracking-wide text-gray-900 uppercase">Core Concepts</h2>
                        <ul class="space-y-4">
                            <li><a href="#" class="transition-colors duration-200 hover:text-gray-900">Roles</a></li>
                            <li><a href="#" class="transition-colors duration-200 hover:text-gray-900">Ranks</a></li>
                            <li><a href="#" class="transition-colors duration-200 hover:text-gray-900">Stories</a></li>
                        </ul>
                    </li>
                    <li class="space-y-5 row-span-2">
                        <h2 class="text-xs font-semibold tracking-wide text-gray-900 uppercase">Customization</h2>
                        <ul class="space-y-4">
                            <li><a href="#" class="transition-colors duration-200 hover:text-gray-900">Configuration</a></li>
                            <li><a href="#" class="transition-colors duration-200 hover:text-gray-900">Themes</a></li>
                            <li><a href="#" class="transition-colors duration-200 hover:text-gray-900">Extensions</a></li>
                        </ul>
                    </li>
                    <li class="space-y-5">
                        <h2 class="text-xs font-semibold tracking-wide text-gray-900 uppercase">Community</h2>
                        <ul class="space-y-4">
                            <li><a href="#" class="transition-colors duration-200 hover:text-gray-900">GitHub</a></li>
                            <li><a href="#" class="transition-colors duration-200 hover:text-gray-900">Discord</a></li>
                            <li><a href="#" class="transition-colors duration-200 hover:text-gray-900">Twitter</a></li>
                        </ul>
                    </li>
                </ul>

                <div class="pt-10 sm:pt-12">
                    <x-logos.anodyne class="w-auto h-7 sm:h-8" />
                </div>
            </div>
        </footer>
    </div>
</x-base-layout>