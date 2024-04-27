<div class="h-10">
    @if (session('error'))
        <div class="m-auto rounded-md text-red-600 font-bold hover:bg-red-600 text-center hover:bg-opacity-40 px-2 py-4">
            {{ session('error') }}
        </div>
    @endif
</div>
