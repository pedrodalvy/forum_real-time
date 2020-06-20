<!doctype html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{ csrf_token() }}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
    <div id="app">
        <example-component>
            Carregando
        </example-component>
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
