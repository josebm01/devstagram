<?php

namespace App\Http\Controllers;

use auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('dashboard');
    }
}
