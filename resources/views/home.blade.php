@extends('layouts.app')

@section('titulo')
    Inicio
@endsection


@section('contenido')
    {{-- Componente --}}
    <x-listar-post :posts="$posts" />
@endsection

