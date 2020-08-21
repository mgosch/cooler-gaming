<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/privacy', function () {
    return view('privacidad');
});

Route::get('/acuerdo', function () {
    return view('acuerdo');
});

Route::get('/reembolso', function () {
    return view('reembolso');
});

Route::get('/legal', function () {
    return view('legal');
});


Route::middleware(['auth'])->group(function () {
 
     Route::get('/home', 'HomeController@index')->name('home');

     Route::get('/alquilar/{id}', 'HomeController@alquilar')->name('alquilar');
 
     Route::get('/car', function () {
         return view('car');
     });
 
     Route::get('/shop', function () {
         $car = \Illuminate\Support\Facades\Auth::user()->getCar();
         $car->clear();
         return redirect('home')->with(['message' => 'Compra exitosa']);
     });
 
     Route::post('/add-to-car', 'CarController@addToCar');

     Route::get('/delete-to-car/{game}/{quantity}', 'CarController@deleteToCar');

     Route::post('/add-comment', 'HomeController@addComments');
 });
