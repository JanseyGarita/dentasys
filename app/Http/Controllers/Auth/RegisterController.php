<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Clinica;
use App\Models\Suscripcione;
use App\Providers\RouteServiceProvider;
use App\Models\User;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    

    use RegistersUsers;

   
    protected $redirectTo = RouteServiceProvider::HOME;

    
    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:200'],
            'email' => ['required', 'string', 'email', 'max:150', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
    }

  
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data,$clinicaid)
    {
        
        return User::create([
            'nombre' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'clinica_id'=>$clinicaid,
            'role_id'=>1
        ]);
    }

    // custom registration
    public function makeRegister(Request $request)
    {
        
        //validation data
       if(($validation=$this->validator($request->all()))->fails()){
        return redirect('register')->withErrors($validation)->withInput();
       }
       
       //create clinica
       $clinica= Clinica::create(
           [
            'nombre'=>'Clinica '.$request->input('name'),
            'email'=>$request->input('email'),
            'pais'=>'CR'
           ]
        );

        $user=$this->create($request->all(),$clinica->id);

        $user->sendEmailVerificationNotification();//envio de correo de verificacion

        Suscripcione::create([
            'clinica_id'=>$clinica->id,
            'plane_id'=>$request->plan        
            ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }


}
