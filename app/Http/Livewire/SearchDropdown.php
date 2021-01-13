<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;


class SearchDropdown extends Component
{
    public $search = '';
    public function render()
    {

        $searchResult = '';

        if (Str::length($this->search) >= 3) {
            $searchResult = Http::get('https://api.themoviedb.org/3/search/movie?api_key=8a9121945fb215b83aac6b1896a8adfe&query=' . $this->search)
                ->json()['results'];
        }
        return view('livewire.search-dropdown', [
            'searchResult' => $searchResult,
        ]);
    }
}
