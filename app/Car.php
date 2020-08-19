<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
            return $carry + ($item->quantity * ((int)($item->game->amount * $item->game->percentaje_rent) / 100));
        }, 0);
    }

    public function deleteProduct($game, $quantity)
    {
        CarGame::where('car_id', $this->id)
                ->where('game_id', $game)
                ->where('quantity', $quantity)
                ->delete();
    }
}
