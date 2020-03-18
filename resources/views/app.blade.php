<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="{{ mix('/css/vendor.css') }}" rel="stylesheet">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}" defer></script>

    <meta name="turbolinks-cache-control" content="no-cache">

    @routes
</head>
<body>
    <div
        id="app"
        data-component="{{ $name }}"
        data-props="{{ json_encode($data) }}"
    ></div>
</body>
</html>