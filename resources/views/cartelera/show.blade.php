@extends('layouts.app')

@section('content')
     <div class="row">
    <div class="col-md-6 mx-auto mt-4">
    <div class="card p-3">
    <img src="{{ $pelicula->imagen }}" alt="imagen-pelicula">
        <h1 class="text-center card-title">{{ $pelicula->titulo }}</h1>
        <h3 class="card-subtitle mt-2">Clasificación: {{ $pelicula->clasificacion }}</h3>
        <h5 class="card-subtitle mt-2">Director: {{ $pelicula->director }}</h5>
        <p class="card-subtitle mt-2">Duración: {{ $pelicula->duracion }}</p>
        <p class="card-subtitle mt-2">Inicio exhibición: {{ $pelicula->ini_exhibicion }}</p>
        <p class="card-subtitle mt-2">Fin exhibición: {{ $pelicula->fin_exhibicion }}</p>
        <!-- <router-link class="btn btn-info" :to='{name:"editarPelicula", params:{url: pelicula.url}}'>Editar Pelicula</router-link> -->
        <a class="btn btn-info" href="{{ $pelicula->url . '/edit' }}">Editar pelicula</a>
    </div>
    </div>
  </div>
@endsection