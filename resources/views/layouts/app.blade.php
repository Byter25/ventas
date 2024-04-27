<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/alertify.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/alertify.min.css') }}">
    <title>@yield('title')</title>
</head>

<body>
    @include('navbar')
    @yield('content')
</body>

</html>
