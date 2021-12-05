<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body>
        <div class="max-w-7xl mx-auto p-4 sm:px-6 lg:px-8 min-h-screen flex bg-gray-100">

            <div class="max-w-3xl m-auto">
                @yield('content')
            </div>

        </div>
    </body>
</html>
