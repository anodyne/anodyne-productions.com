<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') &bull; {{ config('app.name', 'Anodyne Productions') }}</title>

    <link href="https://rsms.me/inter/inter.css" rel="stylesheet">
    @stack('styles')

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.js" defer></script>
    @stack('scripts')
</head>
<body class="font-sans bg-gray-100 text-gray-900 antialiased">
    @yield('layout')
</body>
</html>