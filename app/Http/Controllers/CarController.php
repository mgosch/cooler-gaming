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


    public function shop() {
        $car = Auth::user()->getCar();
        $car->shop();

        $user = Auth::user();
        $user->total_cooler_coins = $car->getNewCoins();
        $user->save();

        $car->clear();
        return redirect('home')->with(['message' => 'Alquiler exitoso. Descarga la app para empezar a jugar desde <a href="https://www.google.com/">acá.</a>']);
    }
}
