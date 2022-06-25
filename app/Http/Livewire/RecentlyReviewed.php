<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class RecentlyReviewed extends Component
{
    public $recentlyReviewedGames = [];

    public function loadRecentlyReviewedGames()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $current = Carbon::now()->timestamp;

        $this->recentlyReviewedGames = Http::withHeaders(config('services.igdb'))
        ->withBody("fields name, summary, rating, cover.url, platforms.abbreviation, first_release_date;
        where(first_release_date > {$before} & first_release_date < {$current});
        where rating != null;
        where rating != 100;
        where total_rating_count > 20 ;
        sort rating desc;
        limit 3;", 
        'text')
        ->post('https://api.igdb.com/v4/games')->json();
    }

    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}
