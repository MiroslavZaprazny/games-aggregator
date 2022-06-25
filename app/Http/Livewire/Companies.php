<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Companies extends Component
{
    public $companies = [];

    public function loadCompanies()
    {
        $this->companies = Http::withHeaders(config('services.igdb'))
        ->withBody('fields name, logo.url, created_at, websites.url; 
        limit 4; where logo.url != null;'
        , 'text')
        ->post('https://api.igdb.com/v4/companies')->json();
    }

    public function render()
    {
        return view('livewire.companies');
    }
}
