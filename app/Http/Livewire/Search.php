<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Search extends Component
{
    public $search = '';
    public $searchResults = [];

    public function render()
    {
       $this->searchResults =  Http::withHeaders(config('services.igdb'))
        ->withBody("search \"{$this->search}\";
         fields name, game.cover.url, game.slug;
        limit 6;", 
        'text')
        ->post('https://api.igdb.com/v4/search')->json();
        return view('livewire.search');
    }
}
