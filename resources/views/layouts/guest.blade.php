<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>

<body class="dark:bg-slate-900">
    <div class="flex flex-col justify-center items-center h-screen">
        @yield('content')
    </div>
</body>

</html>
