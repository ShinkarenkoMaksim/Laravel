<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@section('title')Страница@show</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="d-flex flex-column h-100">
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
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
