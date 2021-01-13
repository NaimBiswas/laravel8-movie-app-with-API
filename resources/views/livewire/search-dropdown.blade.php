<div>
    <li class="reletive mt-2">
        <input wire:model.debounce.500ms="search"
            type="text"
            class="bg-gray-800 rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline"
            placeholder="Search...">
    </li>
    <div class="absolute bg-gray-800 rounded mt-2 w-64">
        <ul>
            @if ($searchResult)

            @foreach ($searchResult as $results)

            <li class="border-b border-gray-700">
                <a target="blank"
                    href="{{ route('movie.show',$results['id']) }}"
                    class="block hover:bg-gray-700 px-3 py-2">{{ $results['title'] }}</a>
            </li>
            @endforeach
            @endif

        </ul>
    </div>
</div>
