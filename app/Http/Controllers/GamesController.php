<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $before = Carbon::now()->subMonths(2)->timestamp;
        $current = Carbon::now()->timestamp;

        $popularGames = Http::withHeaders(config('services.igdb'))
        ->withBody("fields name, rating, cover.url, platforms.abbreviation;
        where rating != null;
        where rating != 100;
        where total_rating_count > 200 ;
        sort rating desc;
        limit 12;", 
        'text')
        ->post('https://api.igdb.com/v4/games')->json();

        $recentlyReviewed = Http::withHeaders(config('services.igdb'))
        ->withBody("fields name, rating, cover.url, platforms.abbreviation, first_release_date;
        where(first_release_date > {$before} & first_release_date < {$current});
        sort rating desc;
        limit 3;", 
        'text')
        ->post('https://api.igdb.com/v4/games')->json();
        ddd($recentlyReviewed);
        
        return view('index',[
            'popularGames' => $popularGames
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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