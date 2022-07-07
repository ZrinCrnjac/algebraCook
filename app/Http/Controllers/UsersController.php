<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct (){
        $this->middleware('auth');
    }

    public function profil(Request $request){
        return view('profil');
    }

    public function update(Request $request){
        $this->validate($request,[
            'password' => 'required|min:6',
        ]);

        $user = auth()->user();
        $user->password = bcrypt($request->all()['password']);
        $user->save();

        return redirect('/profil')->with('flash_notification.message', 'Uspješno ste promijenili lozinku')
			->with('flash_notification.level', 'success');
    }
}
