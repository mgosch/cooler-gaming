<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;
use App\Comment;

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
                                   ->get(['games.id', 'games.name', 'games.description', 'games.image', 'genres.description as genero']);
        return view('home', compact('games'));
    }

    public function alquilar($id)
	{
        $detalle = App\Game::findOrFail($id);
        $comments = DB::table('comments')->where('comments.game_id', $id)
                                         ->get();
        $price_rent = ($detalle->amount * $detalle->percentaje_rent) / 100;
		return view('alquilar', compact('detalle', 'comments', 'price_rent'));
    }

    public function addComments(Request $request)
    {
        $newComment = new Comment;
        $newComment->game_id = $request['id'];
        $newComment->comment = $request['comment'];
        $newComment->save();

        return redirect(route('alquilar', $request['id']))->with(['message' => 'Se agregó el comentario']);
    }

}
