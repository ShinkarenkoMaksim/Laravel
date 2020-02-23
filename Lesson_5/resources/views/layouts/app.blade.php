<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body id="app" class="d-flex flex-column h-100">


    <header>
        @yield('menu')
    </header>

    <main role="main" class="flex-shrink-0">
        <div class="container">


            @yield('content')
        </div>
    </main>

    <footer class="footer mt-auto py-3">
        <div class="container">
            <span class="text-muted">&copy; Права защищены</span>
        </div>
    </footer>

</body>
</html>
