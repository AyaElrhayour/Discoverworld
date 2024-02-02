<x-layout>
    @include('partials._hero')
    @include('partials._search')



    <div class="main">
        <div class="counting">
            <div class="inner-div">
                <div class="colum">
                    <i class="fas fa-compass"></i>
                    <div class="number">{{ $totalAdventures }}</div>
                    <h3>Total Adventures</h3>
                </div>
                <div class="colum">
                    <i class="fas fa-users"></i>
                    <div class="number">{{ $totalUsers }}</div>
                    <h3>Total Users</h3>
                </div>
                <div class="colum">
                    <i class="fas fa-globe"></i>
                    <div class="number">{{ $mostVisitedDestination->total }}</div>
                    <h3>Most Visited Destination: {{ $mostVisitedDestination->destinations }}</h3>
                </div>
            </div>
        </div>        
      </div>



    <form action="/" method="GET">
        <select class="border border-gray-200 rounded p-2 w-26 mb-6" name="destinations">
            <option value="">Select Destination</option>
            @foreach ($countries as $country)
                <option value="{{ $country["common"] }}">{{ $country["common"] }}</option>
            @endforeach
        </select>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Filter
        </button>
        
    </form>
    <form action="/"  method="GET">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            All
        </button>
    </form>
    <form action="/" method="GET">
        <input type="hidden" name="order_by" value="latest">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Show Latest Adventures</button>
    </form>
    
    <form action="/" method="GET">
        <input type="hidden" name="order_by" value="earliest">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Show Earliest Adventures</button>
    </form>
    

    <div class="lg:grid lg:grid-cols-3 gap-x-8 gap-y-24 space-y-4 md:space-y-0 mx-4">
        @unless (count($adventures) == 0)
            @foreach ($adventures as $adventure)
                <x-adventure-card :adventure="$adventure" />
            @endforeach
        @else
            <h1>No Adventures found </h1>
        @endunless
    </div>

    <div class="mt-6 p-4">
        {{ $adventures->links() }}
    </div>
</x-layout>
