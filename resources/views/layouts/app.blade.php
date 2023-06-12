<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'EZSCRIPTRX Library')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
        <script>

    </script>
    </head>
    <body>
        <!-- Page Heading -->
        <header>
            @include('layouts.navigation')
        </header>

        <!-- Page Content -->
        <main>
            @yield('content')
            
            
        </main>
        <footer>
            @include('layouts.footer')
        </footer>
    </body>
</html>