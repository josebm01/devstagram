@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection


@section('contenido')
    <div class="container mx-auto flex">
        <div class="md:w-1/2">

            <div class="flex justify-center items-center">
                <img class="rounded-xl" width="600" src="{{ asset('uploads').'/'.$post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
            </div>
            <div class="ml-5">
                <div class="mt-3">
                    <p>0 likes</p>
                </div>
                <div>
                    {{-- accediendo a la relación de post con usuario --}}
                    <p class="font-bold" href="">{{ $post->user->username }} <span class="font-normal"> {{ $post->descripcion }}</span> </p>
                    <p class="text-sm text-gray-500">
                        {{ $post->created_at->diffForHumans() }}
                    </p>
                </div>
            </div>
        </div>

        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white rounded-xl mb-5 p-5">
                <p class="text-xl font-bold text-center mb-4">Agrega un Nuevo Comentario</p>
            
                <form action="">
                    <div class="mb-5">
                        <label for="comentario" class="mb-2 block uppercase text-gray-500 font-bold">Comentario</label>
                        <textarea 
                            id="comentario"
                            name="comentario"
                            placeholder="Agrega un comentario"
                            class="border p-3 w-full rounded-lg @error('comentario') border-red-500 @enderror"
                        ></textarea>
                        @error('comentario')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <input 
                        type="submit"
                        value="Comentar"
                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                    />


                </form>

            </div>
        </div>
    </div>
@endsection