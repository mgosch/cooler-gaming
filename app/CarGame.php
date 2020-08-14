<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarGame extends Model
{
    protected $table = 'car_games';

    public function game()
    {
        return $this->belongsTo('App\Game');
    }
}
