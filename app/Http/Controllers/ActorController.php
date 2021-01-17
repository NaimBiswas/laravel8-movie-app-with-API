<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActorController extends Controller
{
    public function index()
    {

        $popularActors = Http::get('https://api.themoviedb.org/3/person/popular?api_key=8a9121945fb215b83aac6b1896a8adfe')
            ->json()['results'];

        return view('actores.index', compact('popularActors'));
    }
    public function show($id)
    {
    }
}
