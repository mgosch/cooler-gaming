<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $gameName = $request->input('name');
        $gameGenre = $request->input('genre');
        $games = DB::table('games')->join('game_genres', 'games.id' , 'game_genres.game_id')
                                   ->join('genres', 'game_genres.genres_id' , 'genres.id')
                                   ->where('games.name', 'LIKE', '%'.$gameName.'%')
                                   ->where('genres.description', 'LIKE', $gameGenre)
                                   ->get(['games.name', 'games.description', 'games.image', 'genres.description as genero']);
        return view('home', compact('games'));
    }

}
