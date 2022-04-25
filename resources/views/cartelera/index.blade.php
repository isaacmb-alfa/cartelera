@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach ($peliculas as $pelicula)
            <div class="col-md-4 mt-4">
                <div class="card">
                    <img src="storage/{{ $pelicula->imagen }}" class="card-img-top" alt="imagen-pelicula" />
                    <div class="card-body">
                        <h3 class="card-title">{{ $pelicula->titulo}}</h3>
                        <h5 class="card-text"><strong>Director:</strong> {{ $pelicula->director }}</h5>
                        <p class="card-text"><strong>Clasificación: </strong> {{ $pelicula->clasificacion }}</p>
                        <p class="card-text"><strong>Duración: </strong> {{ $pelicula->duracion }}</p>
                        <p class="card-text"><strong>Inicio exhibición: </strong> {{$pelicula->ini_exhibicion }}</p>
                        <p class="card-text"><strong>Fin exhibición: </strong> {{ $pelicula->fin_exhibicion }}</p>
                        <a class="btn btn-primary btn-block" href="{{ route('cartelera.show', ['pelicula' => $pelicula->url]) }}">Ver Pelicula</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
