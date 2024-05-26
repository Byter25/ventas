<nav class="flex h-full justify-evenly gap-5 items-center  dark:bg-gray-900  dark:text-orange-600">
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
</nav>
