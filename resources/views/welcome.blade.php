@extends('layouts.main')
@section('content')
<div class="container mx-auto px-4 pt-16 border-b border-gray-800">
    <div class="popular-movies mb-12 ">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold popular-movie">Top Rated Movies</h2>
        <div class="grid xs:grid-cols-1 justify-center sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-12">

            @foreach ($topRated as $tM)
            @if ($loop->index <= 14)
                <div
                class="mt-8">
                <a href="{{ route('movie.show', $tM['id']) }}">
                    <img src="{{ "https://image.tmdb.org/t/p/w500/".$tM['poster_path'] }}"
                        alt="Move Poster"
                        class="hover:opacity-75 transition ease-in-out">
                </a>
                <div class="mt-2">
                    <a href="{{ route('movie.show', $tM['id']) }}"
                        class="text-lg mt-2 hover:text-gray-300">
                        {{ Str::limit($tM['title'], 22) }}
                    </a>
                    <div class="flex item-center text-gray-400 mt-1 text-sm">
                        <span class="ml-1 mt-0">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                height="13pt"
                                viewBox="0 -10 511.98685 511"
                                width="13pt">
                                <path
                                    d="m510.652344 185.902344c-3.351563-10.367188-12.546875-17.730469-23.425782-18.710938l-147.773437-13.417968-58.433594-136.769532c-4.308593-10.023437-14.121093-16.511718-25.023437-16.511718s-20.714844 6.488281-25.023438 16.535156l-58.433594 136.746094-147.796874 13.417968c-10.859376 1.003906-20.03125 8.34375-23.402344 18.710938-3.371094 10.367187-.257813 21.738281 7.957031 28.90625l111.699219 97.960937-32.9375 145.089844c-2.410156 10.667969 1.730468 21.695313 10.582031 28.09375 4.757813 3.4375 10.324219 5.1875 15.9375 5.1875 4.839844 0 9.640625-1.304687 13.949219-3.882813l127.46875-76.183593 127.421875 76.183593c9.324219 5.609376 21.078125 5.097657 29.910156-1.304687 8.855469-6.417969 12.992187-17.449219 10.582031-28.09375l-32.9375-145.089844 111.699219-97.941406c8.214844-7.1875 11.351563-18.539063 7.980469-28.925781zm0 0"
                                    fill="#ffc107" />
                            </svg>
                        </span>
                        <span class="ml-1">{{ $tM['vote_average' ]* 10 . '%' }}</span>
                        <span class="ml-1">|</span>
                        <span class="ml-1">{{ \Carbon\Carbon::parse($tM['release_date'])->format('M d, Y')  }}</span>
                    </div>
                    @foreach ($tM['genre_ids'] as $gL)
                    @foreach ($genreList as $GL)
                    @if ($gL === $GL['id'])
                    <span class="text-gray-300">{{ $GL['name'] }},</span>
                    @endif
                    @endforeach


                    @endforeach
                </div>
        </div>
        @endif
        @endforeach


    </div>


</div>

<div class="container mx-auto px-4 pt-16 border-b border-gray-800">
    <div class="popular-movies mb-12 ">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold popular-movie">UpComing Movies</h2>
        <div class="grid xs:grid-cols-1 justify-center sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-12">

            @foreach ($upcomingMovies as $uM)
            <div class="mt-8">
                <a href="{{ route('movie.show', $uM['id']) }}">
                    <img src="{{ "https://image.tmdb.org/t/p/w500/".$uM['poster_path'] }}"
                        alt="Move Poster"
                        class="hover:opacity-75 transition ease-in-out">
                </a>
                <div class="mt-2">
                    <a href="{{ route('movie.show', $uM['id']) }}"
                        class="text-lg mt-2 hover:text-gray-300"> {{ $uM['title'] }} </a>
                    <div class="flex item-center text-gray-400 mt-1 text-sm">
                        <span class="ml-1 mt-0">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                height="13pt"
                                viewBox="0 -10 511.98685 511"
                                width="13pt">
                                <path
                                    d="m510.652344 185.902344c-3.351563-10.367188-12.546875-17.730469-23.425782-18.710938l-147.773437-13.417968-58.433594-136.769532c-4.308593-10.023437-14.121093-16.511718-25.023437-16.511718s-20.714844 6.488281-25.023438 16.535156l-58.433594 136.746094-147.796874 13.417968c-10.859376 1.003906-20.03125 8.34375-23.402344 18.710938-3.371094 10.367187-.257813 21.738281 7.957031 28.90625l111.699219 97.960937-32.9375 145.089844c-2.410156 10.667969 1.730468 21.695313 10.582031 28.09375 4.757813 3.4375 10.324219 5.1875 15.9375 5.1875 4.839844 0 9.640625-1.304687 13.949219-3.882813l127.46875-76.183593 127.421875 76.183593c9.324219 5.609376 21.078125 5.097657 29.910156-1.304687 8.855469-6.417969 12.992187-17.449219 10.582031-28.09375l-32.9375-145.089844 111.699219-97.941406c8.214844-7.1875 11.351563-18.539063 7.980469-28.925781zm0 0"
                                    fill="#ffc107" />
                            </svg>
                        </span>
                        <span class="ml-1">{{ $uM['vote_average' ]* 10 . '%' }}</span>
                        <span class="ml-1">|</span>
                        <span class="ml-1">{{ \Carbon\Carbon::parse($uM['release_date'])->format('M d, Y')  }}</span>
                    </div>
                    @foreach ($uM['genre_ids'] as $gL)
                    @foreach ($genreList as $GL)

                    @if ($gL === $GL['id'])

                    <span class="text-gray-300">{{ $GL['name'] }},</span>

                    @endif
                    @endforeach


                    @endforeach
                </div>
            </div>
            @endforeach


        </div>


    </div>
</div>
<div class="container mx-auto px-4 pt-16 border-b border-gray-800">
    <div class="popular-movies mb-12 ">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold popular-movie">Popular Movies</h2>
        <div class="grid xs:grid-cols-1 justify-center sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-12">

            @foreach ($popularMovies as $pM)
            <div class="mt-8">
                <a href="{{ route('movie.show', $pM['id']) }}">
                    <img src="{{ "https://image.tmdb.org/t/p/w500/".$pM['poster_path'] }}"
                        alt="Move Poster"
                        class="hover:opacity-75 transition ease-in-out">
                </a>
                <div class="mt-2">
                    <a href="{{ route('movie.show', $pM['id']) }}"
                        class="text-lg mt-2 hover:text-gray-300"> {{ $pM['title'] }} </a>
                    <div class="flex item-center text-gray-400 mt-1 text-sm">
                        <span class="ml-1 mt-0">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                height="13pt"
                                viewBox="0 -10 511.98685 511"
                                width="13pt">
                                <path
                                    d="m510.652344 185.902344c-3.351563-10.367188-12.546875-17.730469-23.425782-18.710938l-147.773437-13.417968-58.433594-136.769532c-4.308593-10.023437-14.121093-16.511718-25.023437-16.511718s-20.714844 6.488281-25.023438 16.535156l-58.433594 136.746094-147.796874 13.417968c-10.859376 1.003906-20.03125 8.34375-23.402344 18.710938-3.371094 10.367187-.257813 21.738281 7.957031 28.90625l111.699219 97.960937-32.9375 145.089844c-2.410156 10.667969 1.730468 21.695313 10.582031 28.09375 4.757813 3.4375 10.324219 5.1875 15.9375 5.1875 4.839844 0 9.640625-1.304687 13.949219-3.882813l127.46875-76.183593 127.421875 76.183593c9.324219 5.609376 21.078125 5.097657 29.910156-1.304687 8.855469-6.417969 12.992187-17.449219 10.582031-28.09375l-32.9375-145.089844 111.699219-97.941406c8.214844-7.1875 11.351563-18.539063 7.980469-28.925781zm0 0"
                                    fill="#ffc107" />
                            </svg>
                        </span>
                        <span class="ml-1">{{ $pM['vote_average' ]* 10 . '%' }}</span>
                        <span class="ml-1">|</span>
                        <span class="ml-1">{{ \Carbon\Carbon::parse($pM['release_date'])->format('M d, Y')  }}</span>
                    </div>
                    @foreach ($pM['genre_ids'] as $gL)
                    @foreach ($genreList as $GL)

                    @if ($gL === $GL['id'])

                    <span class="text-gray-300">{{ $GL['name'] }},</span>

                    @endif
                    @endforeach


                    @endforeach
                </div>
            </div>
            @endforeach


        </div>


    </div>
</div>
<div class="container mx-auto px-4 pt-16 border-b border-gray-800">
    <div class="popular-movies mb-12 ">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold popular-movie">Now Palying</h2>
        <div class="grid xs:grid-cols-1 justify-center sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-12">

            @foreach ($NowPlaying as $Np)
            <div class="mt-8">
                <a href="{{ route('movie.show', $Np['id']) }}">
                    <img src="{{ "https://image.tmdb.org/t/p/w500/".$Np['poster_path'] }}"
                        alt="Move Poster"
                        class="hover:opacity-75 transition ease-in-out">
                </a>
                <div class="mt-2">
                    <a href="{{ route('movie.show', $Np['id']) }}"
                        class="text-lg mt-2 hover:text-gray-300"> {{ $Np['title'] }} </a>
                    <div class="flex item-center text-gray-400 mt-1 text-sm">
                        <span class="ml-1 mt-0">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                height="13pt"
                                viewBox="0 -10 511.98685 511"
                                width="13pt">
                                <path
                                    d="m510.652344 185.902344c-3.351563-10.367188-12.546875-17.730469-23.425782-18.710938l-147.773437-13.417968-58.433594-136.769532c-4.308593-10.023437-14.121093-16.511718-25.023437-16.511718s-20.714844 6.488281-25.023438 16.535156l-58.433594 136.746094-147.796874 13.417968c-10.859376 1.003906-20.03125 8.34375-23.402344 18.710938-3.371094 10.367187-.257813 21.738281 7.957031 28.90625l111.699219 97.960937-32.9375 145.089844c-2.410156 10.667969 1.730468 21.695313 10.582031 28.09375 4.757813 3.4375 10.324219 5.1875 15.9375 5.1875 4.839844 0 9.640625-1.304687 13.949219-3.882813l127.46875-76.183593 127.421875 76.183593c9.324219 5.609376 21.078125 5.097657 29.910156-1.304687 8.855469-6.417969 12.992187-17.449219 10.582031-28.09375l-32.9375-145.089844 111.699219-97.941406c8.214844-7.1875 11.351563-18.539063 7.980469-28.925781zm0 0"
                                    fill="#ffc107" />
                            </svg>
                        </span>
                        <span class="ml-1">{{ $Np['vote_average' ]* 10 . '%' }}</span>
                        <span class="ml-1">|</span>
                        <span class="ml-1">{{ \Carbon\Carbon::parse($Np['release_date'])->format('M d, Y')  }}</span>
                    </div>
                    @foreach ($Np['genre_ids'] as $gL)
                    @foreach ($genreList as $GL)

                    @if ($gL === $GL['id'])

                    <span class="text-gray-300">{{ $GL['name'] }},</span>

                    @endif
                    @endforeach


                    @endforeach
                </div>
            </div>
            @endforeach


        </div>


    </div>
</div>





<style>
    .popular-movie {
        color: #ed8936;
    }

</style>
@endsection
