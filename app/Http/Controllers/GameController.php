<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function inicio(Request $request) {
        $gameName = $request->input('name');
        $games = DB::table('games')->join('game_genres', 'games.id' , 'game_genres.game_id')
                                   ->join('genres', 'game_genres.genres_id' , 'genres.id')
                                   ->where('games.name', 'LIKE', '%'.$gameName.'%')
                                   ->get(['games.name', 'games.description', 'games.image', 'genres.description as genero']);
        return view('welcome', compact('games'));
    }
}
