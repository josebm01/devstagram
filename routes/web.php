<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


Route::get('/', function () {
    return view('principal');
});

Route::get('/register', [ RegisterController::class, 'index' ])->name('register');
Route::post('/register', [ RegisterController::class, 'store' ]);

Route::get('/login', [ LoginController::class, 'index' ])->name('login');
Route::post('/login', [ LoginController::class, 'store' ]);

// verifica si el usuario está autenticado para poder mostrar la vista
Route::get('/muro', [ PostController::class, 'index' ])->name('posts.index')->middleware('auth'); 
