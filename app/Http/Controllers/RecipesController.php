<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Recipe;
use \App\Models\Ingredient;

class RecipesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
        return view('recipes.index')->with('recipes', Recipe::get());
    }
}
