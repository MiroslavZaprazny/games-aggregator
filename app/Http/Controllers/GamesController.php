<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
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
        return view('index');
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
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $game = Http::withHeaders(config('services.igdb'))
        ->withBody("fields name, cover.url, first_release_date, platforms.abbreviation, rating, slug,
        involved_companies.company.name, genres.name, aggregated_rating, summary, screenshots.*, similar_games.*, similar_games.cover.url, 
        similar_games.platforms.*, websites.*, videos.*;
         where slug=\"$slug\";", 
        'text')
        ->post('https://api.igdb.com/v4/games')->json();

        abort_if(!$game, 404);
        
        return view('show',[
            'game' => $this->formatData($game[0])
        ]);
    }

    public function formatData($game)
    {
        return collect($game)->merge([
            'social' => [
                'website' => collect($game['websites'])->first(),
                'facebook' => collect($game['websites'])->filter(function ($website){
                    return Str::contains($website['url'], 'facebook'); 
                })->first(),
                'twitter' => collect($game['websites'])->filter(function ($website){
                    return Str::contains($website['url'], 'twitter'); 
                })->first(),
                'instagram' => collect($game['websites'])->filter(function ($website){
                    return Str::contains($website['url'], 'instagram'); 
                })->first()
            ],
            'trailer' => 'https://youtube.com/embed/' . $game['videos'][0]['video_id']
        ])->toArray();
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
