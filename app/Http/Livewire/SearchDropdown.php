<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;


class SearchDropdown extends Component
{
    public $search = '';
    public function render()
    {
        $search = Http::get('https://api.themoviedb.org/3/search/movie?api_key=8a9121945fb215b83aac6b1896a8adfe&query=avengers')->json();


        return view('livewire.search-dropdown');
    }
}
