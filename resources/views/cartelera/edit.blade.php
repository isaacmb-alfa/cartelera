@extends('layouts.app')

@section('content')
    <div class="row">
        {{-- {{ dd($pelicula[0]->url) }} --}}
        <div class="col-md-9 mx-auto mt-4">
            <div class="card p-3">
                <h1 class="text-center mt-3">Editando Película</h1>
                <p class="text-bold text-center text-secondary lead">{{ $pelicula->titulo }}</p>
                @if (session('estado'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>{{ session('message') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="mt-5 row justify-content-center">
                    <form action="{{ route('cartelera.update', ['url' => $pelicula->url]) }}"
                        class="col-md-9 col-xs-12 card card-body" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="titulo">Título de la Película</label>
                            <input name="titulo" id="titulo" type="text" value="{{ $pelicula->titulo }}"
                                class="form-control" placeholder="Título de la película" />
                        </div>
                        <div class="form-group">
                            <label for="director">¿Quién didige la película?</label>
                            <input name="director" id="director" type="text" value="{{ $pelicula->director }}"
                                class="form-control" placeholder="Director de la película" />
                            @error('nombre')
                                <div class="incalid-feedback">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        @php 
                            $clasification = ['AA' , 'A', 'B', 'B15','C', 'D'];
                        @endphp
                        <div class="form-group">
                            <label for="clasificacion">Clasificación de la película</label>
                            <select name="clasificacion" id="clasificacion" class="form-control @error('clasificacion') is-invalid @enderror">
                                <option disabled selected>Select...</option>
                                @foreach ( $clasification as $class )
                                    <option {{ $pelicula->clasificacion == $class ? 'selected' : '' }} value="{{  $class  }}">{{  $class }}</option>
                                @endforeach
                            </select>
                        </div>
                        
        
                        <div class="form-group">
                            <label for="duracion">¿Cuánto dura la pelcicula? <small>Coloca HH:MM para registrar el tiempo
                                    que dura la película</small> </label>
                            <input name="duracion" id="duracion" type="text" value="{{ $pelicula->duracion }}"
                                class="form-control" />
                            @error('duracion')
                                <div class="incalid-feedback">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="imagen">Elige una imagen para la película</label>
                            <input name="imagen" type="file" class="form-control-file" id="imagen">
                            @error('imagen')
                                <div class="incalid-feedback">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ini_exhibicion">¿Cuánto inicia la proyección? <small>Favor de introducir la hora con
                                    el sig formato Año-Mes-Día Hora:min:seg </small></label>
                            <input name="ini_exhibicion" id="ini_exhibicion" type="datetime"
                                value="{{ $pelicula->ini_exhibicion }}" class="form-control"
                                placeholder="AAAA-MM-DD HH:MM:SS" />
                            @error('ini_exhibicion')
                                <div class="incalid-feedback">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fin_exhibicion">¿Cuánto termina la proyección? <small>Favor de introducir la hora
                                    con el sig formato Año-Mes-Día Hora:min:seg </small></label>
                            <input name="fin_exhibicion" id="fin_exhibicion" type="datetime"
                                value="{{ $pelicula->fin_exhibicion }}" class="form-control"
                                placeholder="AAAA-MM-DD HH:MM:SS" />
                            @error('fin_exhibicion')
                                <div class="incalid-feedback">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <button class="btn btn-success" type="submit">Guardar Película</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
