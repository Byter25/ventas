<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- script de alertify --}}
    <script src="{{ asset('js/alertify.min.js') }}"></script>
    {{-- //css de alertify --}}
    <link rel="stylesheet" href="{{ asset('css/alertify.min.css') }}">
    <title>@yield('title')</title>
</head>

<body>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .options {
            position: fixed;
            right: -100%;
            z-index: -10;
            text-align: left;
            background: inherit;
            top: 56px;
            transition: all 300ms ease-in-out;
        }
        li{
            padding: 10px 10px;
        }
        .options li:hover{
            background-color: red;
        }
        #checkUser:checked~.options {
            background: inherit;
            right: 0;
        }
    </style>
    <header class="flex h-14  z-50 justify-between items-center  sticky top-0 w-full bg-yellow-400">
        <x-flex>
            <img src="" alt="logo">
            <span class=" text-inherit">logo</span>
        </x-flex>
        @include('navbar')
        @guest
            <a href="{{ route('login') }}"
                class="justify-center items-center border-b-2 border-none hover:border-sol border-orange-600 px-2 transition-all">Login</a>
        @endguest
        @auth
            <input type="checkbox" name="checkUser" id="checkUser" class="hidden" />
            <label for="checkUser" class="flex px-2 gap-5 bg-inherit">
                <span>{{ Auth::user()->user }}</span>
                <img src="" alt="imgUser" class="imgUser">
            </label>
            <ul class="options">
                <li>configuracion</li>
                <li><button>Modo Oscuro</button></li>
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Cerrar Sesión</button>
                    </form>
                </li>
            </ul>
        @endauth
    </header>
    @yield('content')
</body>

</html>
