<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Game;
use App\Comment;
use App\Genre;
use App\GameGenre;
use App\Rental;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\GameExport;
use App\Exports\UserExport;

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
        $games = DB::table('games')
                                   ->join('game_genres', 'games.id' , 'game_genres.game_id')
                                   ->join('genres', 'game_genres.genres_id' , 'genres.id')
                                   ->where('games.state', 'HABILITADO')
                                   ->where('games.name', 'LIKE', '%'.$gameName.'%')
                                   ->where('genres.description', 'LIKE', $gameGenre)
                                   ->get(['games.id', 'games.name', 'games.description', 'games.image', 'genres.description as genero']);
        return view('home', compact('games'));
    }

    public function alquilar($id)
	{
        $detalle = Game::findOrFail($id);
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

    public function getGames() {
        $games = DB::table('games')->where('games.state', 'HABILITADO')
                                    ->join('game_genres', 'games.id' , 'game_genres.game_id')
                                    ->join('genres', 'game_genres.genres_id' , 'genres.id')
                                    ->select('games.*', 'genres.description as genero')
                                    ->orderBy('games.name', 'asc')
                                    ->get();
        return view('abm', compact('games'));
    }

    public function addGame(Request $request)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move(public_path() . '/images/' , $name);
        }

        $newGame = new Game;
        $newGame->name = $request->input('name');
        $newGame->description = $request->input('description');
        $newGame->state = 'HABILITADO';
        $newGame->percentaje_rent = $request->input('percentaje');
        $newGame->amount = $request->input('amount');
        $newGame->reward_cooler_coins = $request->input('rewards');
        $newGame->image = $request->file('image')->getClientOriginalName();
        $newGame->save();

        $genres = Genre::where('description', $request->input('genres'))->first();
        $game = Game::where('name', $request->input('name'))->first();

        $gameGenre = new GameGenre();
        $gameGenre->game_id = $game->id;
        $gameGenre->genres_id = $genres->id;
        $gameGenre->save();

        return redirect('abm')->with(['message' => 'Se agrego el juego exitosamente']);
    }

    public function deleteGame($id) {
        $game = Game::find($id);
        $game->state = 'BAJA';
        $game->save();
                                    
        return redirect('abm')->with(['message' => 'Se elimino el juego']);
    }

    public function editGame(Request $request)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $file->move(public_path() . '/images/' , $name);
        }

        $game = Game::find($request->input('id'));
        $game->name = $request->input('name');
        $game->description = $request->input('description');
        $game->state = 'HABILITADO';
        $game->percentaje_rent = $request->input('percentaje');
        $game->amount = $request->input('amount');
        $game->reward_cooler_coins = $request->input('rewards');
        if ($request->hasFile('image')) {
        $game->image = $request->file('image')->getClientOriginalName();
        }
        $game->save();

        $genres = Genre::where('description', $request->input('genres'))->first();

        $gameGenre = GameGenre::where('game_id', $request->input('id'))->first();;
        $gameGenre->genres_id = $genres->id;
        $gameGenre->save();

        return redirect('abm')->with(['message' => 'Se modifico el juego']);
    }

    public function getRentals() {
        $rentals = Game::rightJoin('rentals', 'game_id', '=', 'games.id')
                        ->select('games.name as name', DB::raw('count(*) as rental_count'), DB::raw('SUM(rentals.time_rent) as total_rent'))
                        ->groupBy('games.name')
                        ->orderByDesc('rental_count')
                        ->orderByDesc('total_rent')
                        ->get();
        $gamers = User::rightJoin('rentals', 'user_id', '=', 'users.id')
                        ->select('users.name as name', DB::raw('count(*) as rental_count'), DB::raw('SUM(rentals.time_rent) as total_rent'))
                        ->groupBy('users.name')
                        ->orderByDesc('rental_count')
                        ->orderByDesc('total_rent')
                        ->get();
        return view('reporte', compact('rentals', 'gamers'));
    }


    public function exportGameExcel() {
        return Excel::download(new GameExport, 'top_de_juegos.xls');
    }

    public function exportUserExcel() {
        return Excel::download(new UserExport, 'top_de_usuarios.xls');
    }

}
