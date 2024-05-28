<table class="m-10 dark:text-white border-solid border-2">
    <thead>
        <tr class="border border-black uppercase">
            @foreach ($columns as $c)
                <th class="p-2">{{ $c }}</th>
            @endforeach
            @isset($addColumns)
                    @foreach ($addColumns as $c)
                        <th class="p-2">{{ $c }}</th>
                    @endforeach
            @endisset
            <th class="p-2">acciones</th>
        </tr>
    </thead>
    <tbody class="">
        {{ $slot }}
    </tbody>
</table>
