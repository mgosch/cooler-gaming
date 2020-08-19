<?php

namespace App\Http\Controllers;

use App\Car;
use App\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function addToCar(Request $request)
    {
        $user = Auth::user();
        $game = Game::find($request['id']);
        $quantity = $request['quantity'];
        $car = $user->getCar();

        $car->addProduct($game, $quantity);

        return redirect('home')->with(['message' => 'Se agregó el producto al carrito']);
    }

    public function deleteToCar($game, $quantity) {
        $car = Auth::user()->getCar();
        $car->deleteProduct($game, $quantity);
        return redirect('car')->with(['message' => 'Se elimino el producto del carrito']);
    }
}
