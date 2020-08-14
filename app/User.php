<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getCar()
    {
        // verifica si hay un carro del usuario
        $possibleCar = Car::where('user_id', $this->id)->first();
        if ($possibleCar) {
            return $possibleCar;
        } else {
            //si no crea uno nuevo
            $newCar = new Car();
            $newCar->user_id = $this->id;
            $newCar->save();
            return $newCar;
        }
    }
}
