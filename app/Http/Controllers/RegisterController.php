<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {
        // dd($request);
        // dd( $request->get('username'));

        // validación
        $request->validate([
            'name' => 'required|max:20', // especificando caracteres minimos
            'username' => 'required|unique:users|min:3|max:15',
            'email' => 'required|unique:users|email|max:60',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);
    }
}
