<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {
        // dd($request);
        // dd( $request->get('username'));

        //! Modificando el request 
        $request->request->add(['username' => Str::slug( $request->username )]);  // slug - convierte a url, los espacios los pone con guiones medios

        //! validación
        $request->validate([
            'name' => 'required|max:20', // especificando caracteres minimos
            'username' => 'required|unique:users|min:3|max:15',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required|confirmed|min:6',
        ]);

        //! creando registro
        User::create([
            'name' => $request->name,
            'username' => $request->username, 
            'email' => $request->email,
            'password' => $request->password,
        ]);


        //! Autenticar usuario 
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password
        // ]);

        //* Otra forma de autenticar
        auth()->attempt( $request->only('email', 'password') );


        //! redireccionar 
        return redirect()->route('posts.index');
        
    }
}
