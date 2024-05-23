<?php

namespace App\Http\Controllers;

use auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class logoutController extends Controller
{
    public function store()
    {
        // cerrando sesión
        auth()->logout();

        // redirigiendo a login
        return Redirect::to('login');
    }
}
