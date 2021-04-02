<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>{{ $pagetitle }}</title>

        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet" />
        <style>body { font-family: 'Arvo', serif; }</style>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        @livewireStyles
    </head>
    <body>
        <main class="container mx-auto">

            @yield('main')

        </main>
        @livewireScripts
    </body>
</html>
