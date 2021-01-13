<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topRated = Http::get('https://api.themoviedb.org/3/movie/top_rated?api_key=8a9121945fb215b83aac6b1896a8adfe')
            ->json()['results'];
        $upcomingMovies = Http::get('https://api.themoviedb.org/3/movie/upcoming?api_key=8a9121945fb215b83aac6b1896a8adfe&language=en-US&page=2')
            ->json()['results'];

        $popularMovies = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=8a9121945fb215b83aac6b1896a8adfe')
            ->json()['results'];

        $genreList = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=8a9121945fb215b83aac6b1896a8adfe')
            ->json()['genres'];

        $NowPlaying = Http::get('https://api.themoviedb.org/3/movie/now_playing?api_key=8a9121945fb215b83aac6b1896a8adfe')
            ->json()['results'];
        return view('welcome', compact(['popularMovies', 'genreList', 'NowPlaying', 'upcomingMovies', 'topRated']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Http::get('https://api.themoviedb.org/3/movie/' . $id . '?api_key=8a9121945fb215b83aac6b1896a8adfe&append_to_response=credits,videos,images')
            ->json();




        // dump($movieCast);
        return view('details', compact(['movie']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
