<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<header>
    @include('layouts.default.header')
</header>

<main>
    <section id="app" class="container">
        @yield('content')
    </section>
</main>

@include('layouts.default.footer')

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
