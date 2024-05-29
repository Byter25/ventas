@php
    use Illuminate\Support\Str;
    $isActive = Str::startsWith(request()->path(), trim(route($link, [], false), '/'));
@endphp

<li >
    <a href="{{ route($link) }}" class="hover:border-yellow-400 cursor-pointer border-b-2 uppercase {{ $isActive ? 'border-yellow-400' : 'border-white' }}">{{ $nombre }}</a>
</li>
