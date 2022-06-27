<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PopularGames extends Component
{
    public $popularGames = [];

    public function loadPopularGames()
    {     
        $this->popularGames = Cache::remember('popular-games', 7, function() {
            return Http::withHeaders(config('services.igdb'))
            ->withBody("fields name, slug, rating, cover.url, platforms.abbreviation;
            where rating != null;
            where rating != 100;
            where total_rating_count > 200 ;
            sort rating desc;
            limit 12;", 
            'text')
            ->post('https://api.igdb.com/v4/games')->json();
        });
    }

    public function render()
    {
        return view('livewire.popular-games');
    }
}
