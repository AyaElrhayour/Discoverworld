<x-layout>

    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Your Adventures
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless ($adventures->isEmpty())
                    @foreach ($adventures as $adventure)
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/adventure/{{ $adventure->id }}">
                                    {{ $adventure->title }}
                                </a>
                            </td>
                            {{-- <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/adventure/{{ $adventure->id }}/edit" class="text-blue-400 px-6 py-2 rounded-xl">
                                    Edit
                                </a>
                            </td> --}}
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <form action="/adventure/{{ $adventure->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500">DELETE</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <p class="text-center">No Adventures Found</p>
                        </td>
                    </tr>
                @endunless

            </tbody>
        </table>
    </div>


</x-layout>
