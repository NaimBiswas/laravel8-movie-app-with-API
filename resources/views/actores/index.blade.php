@extends('layouts.main')
@section('content')
<div class="container mx-auto px-4 pt-16 border-b border-gray-800">
    <div class="popular-movies mb-12 ">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold popular-movie">Popular Actors</h2>
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
                    <a href="{{ route('actor.show', $tM['id']) }}"
                        class="text-lg mt-2 hover:text-gray-300">
                        {{ Str::limit($tM['title'], 22) }}
                    </a>
                    <div class="text-sm truncate text-gray-400">
                        <span>All Information here</span>
                        <span>All Information here</span>
                        <span>All Information here</span>
                        <span>All Information here</span>
                        <span>All Information here</span>
                        <span>All Information here</span>
                    </div>


                    @endforeach
                </div>
        </div>
        @endif
        @endforeach


    </div>


</div>
<style>
    .popular-movie {
        color: #ed8936;
    }

</style>
@endsection
