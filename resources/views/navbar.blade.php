<style>
    .options {
        position: absolute;
        z-index: -10;
        top: -100%;
        right: 0;
        padding: 20px;
        transition: .3s;
    }

    #checkUser:checked~.options {
        background: inherit;
        top: 48px;
    }
</style>
<nav
    class="w-full h-12 top-0 flex justify-between items-center px-5 bg-yellow-500 sticky dark:bg-gray-900  dark:text-orange-600">
    <x-flex>
        <img src="" alt="logo">
        <span class=" text-inherit">logo</span>
    </x-flex>
    <x-flex>
        <x-link href="{{ route('home') }}" :active="request()->routeIs('home')">
            {{ __('Home') }}</x-link>
        <x-link href="{{ route('home') }}" :active="request()->routeIs('')">
            {{ __('Productos') }}</x-link>
        <x-link href="{{ route('home') }}" :active="request()->routeIs('')">
            {{ __('Home') }}</x-link>
        @if (Auth::check() && Auth::user()->hasRole('admin'))
            <x-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}</x-link>
        @endif
        <!-- Agrega aquí otros enlaces de navegación -->
    </x-flex>
    @guest
        <a href="{{ route('login') }}"
            class="justify-center items-center border-b-2 border-none hover:border-sol border-orange-600 px-2 transition-all">Login</a>
    @endguest
    @auth
        <input type="checkbox" name="checkUser" id="checkUser" class="hidden" />
        <div class=" bg-inherit h-full flex">
            <label for="checkUser" class="flex m-auto px-2 gap-5">
                <span>{{ Auth::user()->user }}</span>
                <img src="" alt="imgUser" class="imgUser">
            </label>
        </div>
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
</nav>
