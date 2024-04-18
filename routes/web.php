<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/{juego}', function ($mygame) {
//     return "Bienvenido al juego ".$mygame;
// });

Route::get('/game',[GamesController::class, "index"])->name('game');

Route::get('/create',[GamesController::class,"create"]);

Route::get('/show/{nameGame}/{category}',[GamesController::class,"show"]);
Route::post('/create/videogame', [GamesController::class, "createVideogame"])->name('createVideogame');
