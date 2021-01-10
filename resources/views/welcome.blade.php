@extends('layouts.main')
@section('content')
<div class="container mx-auto px-4 pt-16">
    <div class="popular-movies">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Movies</h2>
        <div class="div grid grid-cols-4 gap-8">
            <div class="mt-8">
                <a href="#">
                    <img src="{{ asset('img/images1.png') }}"
                        alt="Move Poster">
                </a>
            </div>
        </div>
    </div>
</div>





<style>
    .popular-movies {
        color: #ed8936;
    }

</style>
@endsection
