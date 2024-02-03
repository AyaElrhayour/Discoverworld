<x-layout>


    <div class="absolute bg-cover left-0 w-full bg-no-repeat bg-center  top-[-60px] h-[30rem] opacity-90 -z-[1]" style="background-image: url('http://127.0.0.1:8000/images/bgo2.jpg')"></div>
            <div class="mx-4 relative top-[12rem]">
                <x-card class="p-10">
                    <div class="flex flex-col items-center justify-center text-center">
                        <img class="w-48 mr-6 mb-6"
                            src="{{ $adventure->logo ? asset('storage/' . $adventure->logo) : asset('/images/bgo2.jpg') }}"
                            alt="" />
                        <h3 class="text-2xl mb-2">{{ $adventure->title }}Developer</h3>
                        {{-- <x-adventure-destinations :destinationsCsv="$adventure->destinations" /> --}}
                        <ul class="flex">
                            <li
                                class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                                <a href="">{{ $adventure->destinations }}</a>
                            </li>
														<li
														class="flex items-center justify-center  text-black mr-2 text-xs">
														<a href="">{{ $adventure->created_at }}</a>
												</li>
                        </ul>
                        <div class="text-lg my-4">
                            <i class="fa-solid fa-location-dot"></i> {{ $adventure->location }}
                        </div>
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Description
                            </h3>
                            <div class="text-lg space-y-6">
                                <p>{{ $adventure->description }}</p>
																<h2 class="text-3xl font-bold mb-4">
																	Tips
															</h2>
																<p>{{ $adventure->tips }}</p>
                                
                            </div>
                        </div>
                    </div>

                </x-card>

                {{-- <x-card class="mt-4 p-2 flex space-x-6">
            <a href="/adventure/{{ $adventure->id }}/edit">
                Edit
            </a>

            <form action="/adventure/{{ $adventure->id }}" method="post">
                @csrf
                @method('DELETE')
                <button class="text-red-500">DELETE</button>
            </form>
        </x-card> --}}

            </div>
</x-layout>
