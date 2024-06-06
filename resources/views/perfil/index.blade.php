@extends('layouts.app')

@section('titulo')
    Editar perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form method="POST" action="{{ route('perfil.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input 
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Tu nombre de usuario"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ auth()->user()->username }}" 
                    />
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ str_replace('username', 'nombre de usuario', $message) }}</p>
                    @enderror
                </div>
                <div class="mb-8">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">Imagen Perfil</label>
                    <input 
                        id="imagen"
                        name="imagen"
                        type="file"
                        class="border p-3 w-full rounded-lg"
                        value="" 
                        accept=".jpg, .jpeg, .png"
                    />
                </div>

                <h1 class="text-xl text-gray-700 font-bold uppercase mb-2">Cambiar contraseña</h1>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña</label>
                    <input 
                        id="password"
                        name="password"
                        type="text"
                        placeholder="Tu password de registro"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror"
                        value="{{ old('password') }}" 
                    />
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ str_replace('password', 'contraseña', $message) }}</p>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repetir Contraseña</label>
                    <input 
                        id="password_confirmation"
                        name="password_confirmation"
                        type="text"
                        placeholder="Repite password de registro"
                        class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-500 @enderror"
                        value="{{ old('password_confirmation') }}" 
                    />
                    @error('password_confirmation')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ str_replace('password_confirmation', 'contraseña', $message) }}</p>
                    @enderror
                </div>

                <input 
                    type="submit"
                    value="Guardar cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>

        </div>
    </div>
@endsection