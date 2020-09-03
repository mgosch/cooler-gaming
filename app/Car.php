<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Car extends Model
{
    public function addProduct(Game $game, $quantity)
    {
        $newItem = new CarGame();
        $newItem->game_id = $game->id;
        $newItem->car_id = $this->id;
        $newItem->quantity = $quantity;
        $newItem->save();
    }

    public function getProducts()
    {
        $games = CarGame::where('car_id', $this->id)->get();
        return $games;
    }

    public function clear()
    {
        CarGame::where('car_id', $this->id)->delete();
    }

    public function getTotal()
    {
        return $this->getProducts()->reduce(function ($carry, $item) {
            return $carry + ($item->quantity * ($item->game->amount * $item->game->percentaje_rent / 100));
        }, 0);
    }

    public function getTotalCoins()
    {
        return $this->getProducts()->reduce(function ($carry, $item) {
                return $carry + ($item->quantity * $item->game->reward_cooler_coins);
        }, 0);
    }

    public function getNewCoins()
    {
        return $this->getProducts()->reduce(function ($carry, $item) {
            if ($this->getDif() < 0) {
                return $carry + (($item->quantity * $item->game->reward_cooler_coins) + (-1 * $this->getDif()));
            } else {
                return $carry + ($item->quantity * $item->game->reward_cooler_coins);
            }
        }, 0);
    }

    public function getDif()
    {
        return $this->getProducts()->reduce(function ($carry, $item) {
            return $carry + (($item->quantity * ($item->game->amount * $item->game->percentaje_rent / 100))-(Auth::user()->total_cooler_coins));
        }, 0);
    }

    public function deleteProduct($game, $quantity)
    {
        CarGame::where('car_id', $this->id)
                ->where('game_id', $game)
                ->where('quantity', $quantity)
                ->delete();
    }

    public function shop() {
        
        $carsGame = CarGame::where('car_id', $this->id)->get();

        foreach ($carsGame as $carGame) {
            $newItem = new Rental();
            $newItem->game_id = $carGame->game_id;
            $newItem->user_id = $this->user_id;
            $newItem->time_rent = $carGame->quantity;
            $newItem->save();
        }

    }
}
