<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index()
    {
        return view('actores.index');
    }
    public function show($id)
    {
    }
}
