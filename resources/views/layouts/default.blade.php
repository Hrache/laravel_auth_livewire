<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>{{ $pagetitle }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet" />
    {{--GOOGLE FONTS s... --}}
    <style>
        body { font-family: 'Arvo', serif; }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    @livewireStyles
    @stack('styles')
</head>
<body class="w3-mobile">
<main class="w3-block w3-animate-opacity">
    <livewire:common.header :title="$title" />
    @yield('main')
    <livewire:common.messages />
</main>

@livewireScripts

<script>
    if ( $( '#messages' ) && $( '#messages > article' ))
    {
        $( '#messages' ).click( function()
        {
            $( this ).remove();
        } );
    }
</script>
</body>
</html>

