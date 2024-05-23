<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;


Route::get('/', function () {
    return view('principal');
});

Route::get('/register', [ RegisterController::class, 'index' ])->name('register');
Route::post('/register', [ RegisterController::class, 'store' ]);

Route::get('/login', [ LoginController::class, 'index' ])->name('login');
Route::post('/login', [ LoginController::class, 'store' ]);
Route::post('/logout', [ LogoutController::class, 'store' ])->name('logout');

/**
 * verifica si el usuario está autenticado para poder mostrar la vista
 * nombre de ruta dinámica - Route Model Binding.
 * Especificamos el nombre de la columna de la base de datos, por defecto pone en la url el id
 */
Route::get('/{user:username}', [ PostController::class, 'index' ])->name('posts.index')->middleware('auth'); 
Route::get('/posts/create', [ PostController::class, 'create' ])->name('posts.create');