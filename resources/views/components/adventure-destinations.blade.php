{{-- @props(['destinationsCsv'])

@php
    $destinations = explode(',', $destinationsCsv);
@endphp

<ul class="flex">
    @foreach ($destinations as $destination)
      <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
            <a href="/?destinations={{ $destination }}">{{ $destination }}</a>
        </li>
        <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
            <a href="">{{ $adventure->destinations }}</a>
        </li>
    @endforeach
</ul> --}}
