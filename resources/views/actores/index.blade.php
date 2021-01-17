@extends('layouts.main')
@section('content')
<div class="container mx-auto px-4 pt-16 border-b border-gray-800">
    <div class="popular-movies mb-12 ">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold popular-movie">Popular Actors</h2>
        <div class="grid xs:grid-cols-1 justify-center sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            @foreach ($popularActors as $pA)
            <div class="mt-8">
                <a href="{{ route('actor.show', $pA['id']) }}">
                    <img src="{{  $pA['profile_path']
                     ? "https://image.tmdb.org/t/p/w500/".$pA['profile_path']
                     : "https://ui-avatars.com/api/?size=500&name=". $pA['name'] }}"
                        alt="Move Poster"
                        class="hover:opacity-75 transition ease-in-out">
                </a>
                <div class="mt-2">
                    <a href="{{ route('actor.show', $pA['id']) }}"
                        class="text-lg mt-2 hover:text-gray-300">
                        {{ Str::limit($pA['name'], 22) }}
                    </a>
                    <div class="text-sm truncate text-gray-400">
                        <span>{{ $pA['known_for_department'] }}</span>,
                        <span>{{ $pA['known_for'][0]['media_type'] }}</span>,
                        <span>{{ $pA['known_for'][0]['overview'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <style>
        .popular-movie {
            color: #ed8936;
        }

    </style>
    @endsection
    @section('js')
    <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>

    <script>

    </script>
    @endsection
