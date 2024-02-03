<x-layout>
    {{-- <div class="absolute  left-0 w-full bg-no-repeat bg-center  top-[-60px] h-[100vh] opacity-90 z-[-1] bg-black">
</div> --}}
    <div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Tell Us Your Adventure
            </h2>
            <p class="mb-4">Share Your Tips With Others</p>
        </header>

        <form method="POST" action="/adventure" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                    value="{{ old('title') }}" />

                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="destinations" class="inline-block text-lg mb-2">Destinations</label>
                <select class="border border-gray-200 rounded p-2 w-full" name="destinations">
                    <option value="">Select Destination</option>
                    @php
                        $sortedCountries = collect($countries)->sortBy('common');
                    @endphp
                    @foreach ($sortedCountries as $country)
                        <option value="{{ $country['common'] }}">{{ $country['common'] }}</option>
                    @endforeach
                </select>

                @error('destinations')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="images" class="inline-block text-lg mb-2">Pictures</label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="images[]" multiple />

                @error('images')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">Description</label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10">{{ old('description') }}</textarea>

                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tips" class="inline-block text-lg mb-2">Tips</label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="tips" rows="10">{{ old('tips') }}</textarea>

                @error('tips')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Share Your Adventure
                </button>
                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </div>

</x-layout>
