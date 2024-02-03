<x-layout>
    @include('partials._hero')
    @include('partials._count')
		@include('partials._filter')
    {{-- @include('partials._search') --}}

 

    <div class="lg:grid lg:grid-cols-3 gap-x-8 gap-y-24 space-y-4 md:space-y-0 mx-4 relative top-[20rem]">
        @unless (count($adventures) == 0)
            @foreach ($adventures as $adventure)
                <x-adventure-card :adventure="$adventure" />
            @endforeach
        @else
            <h1>No Adventures found </h1>
        @endunless
    </div>

    <div class="mt-6 p-4 relative top-[20rem] mb-11">
        {{ $adventures->links() }}
    </div>
</x-layout>
