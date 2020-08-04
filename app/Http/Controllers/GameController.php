<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class GameController extends Controller
{
    public function inicio() {
        $games = App\Game::all();
        return view('welcome', compact('games'));
    }
}
