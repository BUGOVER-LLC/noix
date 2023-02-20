<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('builds/app/css/app.css') }}">
    <script defer src="{{ mix('builds/app/js/app.js') }}"></script>
</head>
<body>
<div id="app-knock" style='height: 100%;'>
    <v-app>
        @yield('app-body')
    </v-app>
</div>
</body>
</html>
