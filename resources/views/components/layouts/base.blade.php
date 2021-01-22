@props([
    'bgColor' => 'gray-100',
    'textColor' => 'gray-500',
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="font-sans text-{{ $textColor }} antialiased bg-{{ $bgColor }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#f99c26">
        <meta name="msapplication-TileColor" content="#130f32">
        <meta name="theme-color" content="#ffffff">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        {{ $slot }}

        <svg class="defs">
            <defs>
                <clipPath id="squircle" clipPathUnits="objectBoundingBox">
                    <path d="M .5 0 C .1 0 0 .1 0 .5 0 .9 .1 1 .5 1 .9 1 1 .9 1 .5 1 .1 .9 0 .5 0 Z" />
                </clipPath>
            </defs>
        </svg>

        @livewireScripts
    </body>
</html>
