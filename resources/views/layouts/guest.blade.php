<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        <footer class="bg-gray-50 pt-16 pb-12 | sm:pt-20 sm:pb-20 md:pt-24 xl:pt-32">
            <div class="max-w-screen-lg mx-auto divide-y divide-gray-200 px-4 | sm:px-6 md:px-8 xl:max-w-screen-xl">
                <ul class="text-sm font-medium pb-14 grid gap-y-10 | sm:pb-20 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
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

                <div class="pt-10 | sm:pt-12">
                    <x-anodyne-logo></x-anodyne-logo>
                </div>
            </div>
        </footer>
    </body>
</html>
