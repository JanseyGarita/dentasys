<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class ProfileController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function showProfile()
    {
  
        return view('perfil.perfil');
    }


    public function updateProfile(Request $request){

        $usuario = Auth::user();
        $usuario = User::findOrFail($usuario->id);
        $input = $request->all();
        $usuario->fill($input)->save();
            // dd($input);
        return redirect()->back();
            // return view('tasks.edit');  
    }
}
