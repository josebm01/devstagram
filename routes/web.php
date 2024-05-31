<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ComentarioController;


Route::get('/', function () {
    return view('principal');
});



Route::get('/register', [ RegisterController::class, 'index' ])->name('register');
Route::post('/register', [ RegisterController::class, 'store' ]);

Route::get('/login', [ LoginController::class, 'index' ])->name('login');
Route::post('/login', [ LoginController::class, 'store' ]);
Route::post('/logout', [ LogoutController::class, 'store' ])->name('logout');

//Perfil
Route::get('/editar-perfil', [PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');

/**
 ** middleware - verifica si el usuario está autenticado para poder mostrar la vista
 ** nombre de ruta dinámica - Route Model Binding.
 ** Especificamos el nombre de la columna de la base de datos, por defecto pone en la url el id
 */
Route::get('/{user:username}', [ PostController::class, 'index' ])->name('posts.index')->middleware('auth'); 
Route::get('/posts/create', [ PostController::class, 'create' ])->name('posts.create');
Route::post('/posts', [ PostController::class, 'store' ])->name('posts.store');
Route::get('/{user:username}/posts/{post}', [ PostController::class, 'show' ])->name('posts.show');
Route::delete('/posts/{post}', [ PostController::class, 'destroy' ])->name('posts.destroy');

// comentarios
Route::post('/{user:username}/posts/{post}', [ ComentarioController::class, 'store' ])->name('comentarios.store');

// Imagen
Route::post('/imagenes', [ImagenController::class, 'store' ])->name('imagenes.store');

//Likes
Route::post('/posts/{post}/likes', [ LikeController::class, 'store' ])->name('posts.likes.store');
Route::delete('/posts/{post}/likes', [ LikeController::class, 'destroy' ])->name('posts.likes.destroy');
