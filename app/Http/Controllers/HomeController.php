<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class HomeController extends Controller implements HasMiddleware
{

    // solo las personas autenticadas pueden ver el inicio de la web
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function middleware(): array
    {
        return [
            new Middleware('auth'),
        ];
    }

    public function __invoke()
    {

        /**
         * Obtener a quienes seguimos 
         * 
         * pluck - solo obtiene ciertos datos especificados
         * toArray - genera un arreglo
         * latest - ordena en orden más reciente primero
         */
        $ids = auth()->user()->followings->pluck('id')->toArray();
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(20);


        return view('home', [ 'posts' => $posts ]); 
    }
}
