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
        * {
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

        li {
            padding: 10px 10px;
            transition: all .3s ease;
        }


        #checkUser:checked~.options {
            background: inherit;
            right: 0;
        }
    </style>
    <header class="flex h-14 z-50 px-5 py-2 justify-between items-center  sticky top-0 w-full bg-gray-800 font-bold text-white uppercase">
        <div class="flex gap-5">
            <img src="" alt="logo">
            <span class=" text-inherit">logo</span>
        </div>
        <div class="flex gap-5 justify-center items-center">
            @include('navbar')
            <div class="h-8 w-8 cursor-pointer p-2 relative flex justify-center items-center hover:bg-gray-950 rounded-md">
                <div class="w-5 h-5 flex items-center justify-center text-[10px] bg-red-500 rounded-full  absolute z-50 -top-[20%] -right-[10%] ">18</div>
                <x-heroicon-c-shopping-cart class="h-9 w-9"/>
            </div>
        </div>
        @guest
            <a href="{{ route('login') }}"
                class="justify-center items-center border-b-2 border-none hover:border-sol border-orange-600 px-2 transition-all">Login</a>
        @endguest
        @auth
            <input type="checkbox" name="checkUser" id="checkUser" class="hidden" />
            <label for="checkUser" class="flex items-center justify-center px-2 gap-5 bg-inherit">
                <span>{{ Auth::user()->user }}</span>
                {{-- <img src="{{ Auth::user()->user }}" alt="imgUser" class="imgUser"> --}}
                <x-heroicon-c-user-circle class="w-10 h-10" />
            </label>
            <ul class="options ">
                <li class="hover:bg-yellow-300 uppercase">configuracion</li>
                <li class="hover:bg-yellow-300 "><button class="uppercase">Modo Oscuro</button></li>
                <li class="hover:bg-yellow-300 uppercase">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="uppercase">Cerrar Sesión</button>
                    </form>
                </li>
            </ul>
        @endauth
    </header>
    @yield('content')
</body>

</html>
