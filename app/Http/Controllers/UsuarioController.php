<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class UsuarioController extends Controller
{
    use RegistersUsers;

    protected function validator(array $data)
    {
        return Validator::make($data, [ 
            'email' => ['required', 'string', 'email', 'max:150', 'unique:users'],
            'password' => ['required', 'string', 'min:8']
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth :: user()->role_id !=1 ) {
            return redirect()->back();
        }
        $action = 'insertar';
        $user = null;
        return view('usuarios', ['action' => $action, 'users' => Auth::user()->clinica->users, 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation data 
        if (($validation = $this->validator($request->only('email','password')))->fails()) {
            return redirect('usuarios')->withErrors($validation)->withInput();
        }

        
        $usuario = User :: create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'email_verified_at' => null,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'clinica_id' => Auth::user()->clinica_id,
            'role_id' => $request->role,
            'activo' => ($request->activo=='on'?1:0),
        ]);
        $usuario->sendEmailVerificationNotification();
        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth :: user()->role_id !=1 ) {
            return redirect()->back();
        }
        $action = 'editar';
        $user = null;
        foreach (Auth::user()->clinica->users as $u) {
            if ($u->id == $id) {
                $user = $u;
            }
        }

        return view('usuarios', ['action' => $action, 'users' => Auth::user()->clinica->users, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $usuario = User::findOrFail($id);

        
        
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        if (isset($request->password)) {
            $usuario->password=Hash::make($request->password);
        }
        $usuario->telefono = $request->telefono;
        $usuario->clinica_id = Auth::user()->clinica_id;
        $usuario->role_id = $request->role;
        $usuario->activo = ($request->activo=='on'?1:0);
        $usuario->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $usuario = User::findOrFail($id);
        $usuario->delete();
        return back();
    }
}
