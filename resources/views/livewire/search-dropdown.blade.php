<div class="reletive"
    x-data="{ isOpen: true }"
    @click.away="isOpen = false">
    <li class=" mt-2">
        <input @keydown.escape.window="isOpen = false"
            @keydown.shift.tab="isOpen = false"
            @focus="isOpen = true"
            wire:model.debounce.500ms="search"
            type="text"
            class="bg-gray-800 rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline"
            placeholder="Search...">
    </li>
    @if (strlen($search) >= 2)
    <div class="absolute bg-gray-800 rounded mt-2 w-64 z-50"
        x-show="isOpen">

        <ul>
            @if ($searchResult)

            @foreach ($searchResult as $results)

            <li class="border-b border-gray-700">
                <a target="blank"
                    href="{{ route('movie.show',$results['id']) }}"
                    class=" hover:bg-gray-700 px-3 py-2 flex items-center">
                    <span><img class="w-8"
                            src="{{ "https://image.tmdb.org/t/p/w92/".$results['poster_path'] }}"
                            alt="Poster Images"></span>
                    <span class="ml-4">{{ $results['title'] }}</span>
                </a>
            </li>
            @endforeach
            @else
            <li class="border-b border-gray-700">
                <a target="blank"
                    href="javascript:avoid('0')"
                    class="block hover:bg-gray-700 px-3 py-2 text-red-600 text-center">NO RESULTS FOUND!</a>
            </li>
            @endif

        </ul>
    </div>
    @endif
</div>
