@php
    use Illuminate\Support\Str;
    $isActive = Str::startsWith(request()->path(), trim(route($link, [], false), '/'));
@endphp

<li class="hover:bg-gray-600 uppercase {{ $isActive ? ' text-yellow-500' : ' cursor-pointer text-white ' }}">
    <a href="{{ route($link) }}" class="h-full w-full">{{ $nombre }}</a>
</li>
