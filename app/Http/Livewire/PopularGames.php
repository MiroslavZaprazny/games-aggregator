<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PopularGames extends Component
{
    public $popularGames = [];

    public function loadPopularGames()
    {     
        $unformatedGames = Cache::remember('popular-games', 7, function() {
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

        $this->popularGames = $this->formatData($unformatedGames);
    }

    public function formatData($games)
    {
        return collect($games)->map(function ($game) {
            return collect($game)->merge([
             'coverImgUrl' =>  Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']),
             'rating' => isset($game['rating']) ? round($game['rating']) : '-',
             'platforms' => collect($game['platforms'])->pluck('abbreviation')->implode(' · ')
            ]);
        })->toArray();
    }

    public function render()
    {
        return view('livewire.popular-games');
    }
}
