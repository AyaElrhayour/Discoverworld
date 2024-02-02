@props(['adventure'])

<x-card>
    <div class="flex flex-col items-center gap-5">
        @if($adventure->images->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($adventure->images as $image)
                    <img class="w-full" src="{{ asset('/images/storage/' . $image->name) }}" alt="Adventure Image">
                @endforeach
            </div>
        @else
            <img class="hidden w-[22.5rem] mr-6 md:block" src="{{ asset('/images/bgo2.jpg') }}" alt="Default Adventure Image" />
        @endif
        <div>
            <h3 class="text-2xl font-bold"><a href="/adventure/{{ $adventure->id }}">{{ $adventure->title }}</a></h3>
            <div class="text-xl font-bold mb-4">{{ $adventure->company }}</div>
            {{-- <x-adventure-destinations :destinationsCsv="$adventure->destinations" /> --}}
                <ul class="flex">
                        <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                            <a href="">{{ $adventure->destinations }}</a>
                        </li>
                </ul>
            <div class="text-base leading-none mt-4"><i class="fa-solid fa-location-dot"></i>{{ $adventure->created_at }}</div>
        </div>
    </div>
</x-card>
