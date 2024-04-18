<?php

namespace App\Http\Controllers;

use App\Models\Videogame;
use Illuminate\Http\Request;
use App\Models\Category;

class GamesController extends Controller
{
    //
    public function index(){
       $gameList =  Videogame::all();
       return view("index",['gameList' => $gameList]);
    }

    public function create(){
        $category = Category::all();
        return view("create",['categories'=>$category]);
    }

    public function show($nameGame, $category=null){
        $date= Now();
        return view("show",['nameGame'=>$nameGame,
                            'category'=>$category,
                            'date'=>$date]);
    }

    public function createVideogame(Request $request)
    {
        $game = new Videogame;
        $game->name = $request->nameVideogame;
        $game->category_id = $request->category_id;
        $game->active = 0;
        $game->save();

        return redirect()->route('game');
    }
}
