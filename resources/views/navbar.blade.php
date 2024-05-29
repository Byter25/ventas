<nav class="flex h-full justify-evenly gap-5 items-center  dark:bg-gray-900  dark:text-orange-600">
    <x-link link="home" nombre="home"/>
    <x-link link="productos" nombre="productos"/>
    @if (Auth::check() && Auth::user()->hasRole('admin'))
        <x-link link="dashboard" nombre="dashboard"/>
    @endif
</nav>
