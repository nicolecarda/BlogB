<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    <!-- Incluye tus archivos CSS aquí -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('layouts._partials.messages')
    @yield('body')
    <footer>
        <!-- Tu pie de página aquí -->
    </footer>
    <!-- Incluye tus archivos JS aquí -->
   
</body>
</html>