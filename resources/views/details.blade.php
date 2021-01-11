@extends('layouts.main')
@section('content')
<section class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex  sm:flex-none ">
        <img src="{{ "https://image.tmdb.org/t/p/w500/".$movie['poster_path'] }}"
            alt="Movie Poster"
            style="width: 24rem">
        <div class="ml-24">
            <h2 class="text-4xl font-semibold text-gray-350">{{ $movie['title'] }}</h2>

            <div class="flex flex-wrap items-center text-gray-400 text-md mt-2">
                <span class="ml-1 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        height="12pt"
                        viewBox="0 -10 511.98685 511"
                        width="12pt">
                        <path
                            d="m510.652344 185.902344c-3.351563-10.367188-12.546875-17.730469-23.425782-18.710938l-147.773437-13.417968-58.433594-136.769532c-4.308593-10.023437-14.121093-16.511718-25.023437-16.511718s-20.714844 6.488281-25.023438 16.535156l-58.433594 136.746094-147.796874 13.417968c-10.859376 1.003906-20.03125 8.34375-23.402344 18.710938-3.371094 10.367187-.257813 21.738281 7.957031 28.90625l111.699219 97.960937-32.9375 145.089844c-2.410156 10.667969 1.730468 21.695313 10.582031 28.09375 4.757813 3.4375 10.324219 5.1875 15.9375 5.1875 4.839844 0 9.640625-1.304687 13.949219-3.882813l127.46875-76.183593 127.421875 76.183593c9.324219 5.609376 21.078125 5.097657 29.910156-1.304687 8.855469-6.417969 12.992187-17.449219 10.582031-28.09375l-32.9375-145.089844 111.699219-97.941406c8.214844-7.1875 11.351563-18.539063 7.980469-28.925781zm0 0"
                            fill="#ffc107" />
                    </svg>
                </span>
                <span class="ml-1">{{ $movie['vote_average' ]* 10 . '%' }}</span>
                <span class="ml-1">|</span>
                <span class="ml-1">{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y')  }}</span>
                <span class="ml-1">|</span>
                @foreach ($movie['genres'] as $gL)



                <span class="text-gray-300 ml-1">{{ $gL['name'] }}@if (!$loop->last),@endif</span>

                @endforeach
            </div>
            <p class="mt-8 text-gray-300">
                {{ $movie['overview'] }}
            </p>

            <div class="mt-12">
                <h4 class="text-white font-smibold">Featured Cast</h4>
                <div class="flex mt-4 ">
                    <div class="mt-4 mr-12">
                        <h5 class="">Production Companies</h5>
                        <h5 class="mt-2">Production Country</h5>
                    </div>
                    <div class="mt-4">
                        <h5>
                            @foreach ( $movie['production_companies'] as $companies)
                            <span>{{ $companies['name'] }}@if (!$loop->last),@endif</span>
                            @endforeach
                        </h5>
                        <h5 class="mt-2">
                            @foreach ( $movie['production_countries'] as $country)
                            <span>{{ $country['name'] }}@if (!$loop->last),@endif</span>
                            @endforeach
                        </h5>
                    </div>

                </div>
            </div>
            @if (count($movie['videos']['results'] ) > 0)
            <div class="mt-12">
                <button class="flex item-center text-gray-200 rounded font-semibold px-4 py-2">
                    <a class="flex"
                        target="blank"
                        href="http://youtube.com/watch?v={{ $movie['videos']['results']['0']['key'] }}">
                        <svg class="mr-2"
                            xmlns="http://www.w3.org/2000/svg"
                            width="40"
                            height="40"
                            viewBox="0 0 24 24">
                            <path
                                d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                        </svg>
                        <span class="mt-2">Watch The Tailer</span>
                    </a>
                </button>

            </div>
            @endif
        </div>
    </div>

</section>
<section class="border-b border-gray-800">
    <div class="container mx-auto px-4 pt-16">
        <div class="movie-cast">
            <h2 class="text-4xl font-semibold">Cast</h2>

            <div class="grid xs:grid-cols-1 justify-center sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 mb-12">

                @foreach ($movie['credits']['cast'] as $cast)@if ($loop->index < 5)
                    <div
                    class="mt-8">
                    <a href="#">
                        <img src=" {{ "https://image.tmdb.org/t/p/w500/". $cast['profile_path'] }} "
                            alt="Move Poster"
                            class="hover:opacity-75 transition ease-in-out">
                    </a>
                    <div class="mt-2">
                        <a href="https://movies.andredemos.ca/actors/90633"
                            class="text-lg mt-2 hover:text-gray:300">{{ $cast['original_name'] }}</a>
                        <div class="text-sm text-gray-400">
                            {{ $cast['character'] }}
                        </div>
                    </div>
            </div>
            @endif
            @endforeach
        </div>


    </div>
    </div>
</section>
<section class="border-b border-gray-800">
    <div class="container mx-auto px-4 pt-12 mb-12">
        <div class="movie-cast">
            <h2 class="text-4xl font-semibold">Images</h2>

            <div class="grid xs:grid-cols-1 justify-center sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">

                @foreach ($movie['images']['backdrops'] as $poster)
                @if ($loop->index < 18)
                    <div
                    class="mt-8">
                    <a href="#">
                        <img src="{{ "https://image.tmdb.org/t/p/w500/". $poster['file_path'] }}"
                            alt="Move Poster"
                            class="hover:opacity-75 transition ease-in-out">
                    </a>
            </div>
            @endif
            @endforeach
        </div>
    </div>


    </div>
</section>
<style>
    button {
        background: #ed8936;
    }

</style>
@endsection
