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

    public function add(Request $request){
        return view('recipes.add');
    }

    public function save(Request $request){
        $data = $request->all();
        $noviRecept = new Recipe;
        $noviRecept->name = $data['name'];
        $noviRecept->description = $data['description'];
        $noviRecept->creator_id = auth()->user()->id;

        $file = $request->file('image');
        $destinationPath = '../public/uploads';
        $noviRecept->image = $file->getClientOriginalName();
        $file->move($destinationPath, $file->getClientOriginalName());

        if($noviRecept->save()){
            foreach($data['ingredient'] as $key => $value){
                $sastojak = new Ingredient;
                $sastojak->name = $value;
                $sastojak->recipe_id = $noviRecept->id;
                $sastojak->save();
            }
        }

        return redirect()->action([RecipesController::class, 'index']);
    }
}
