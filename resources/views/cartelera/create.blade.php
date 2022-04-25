@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-9 mx-auto mt-4">
            <div class="card p-3">
                <h1 class="text-center mt-3">Registrar Película</h1>
                @if (session('estado'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>{{ session('message') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="mt-5 row justify-content-center">
                    <form action="{{ route('cartelera.store') }}" class="col-md-9 col-xs-12 card card-body" method="POST"
                        enctype="multipart/form-data" novalidate>
                        @csrf
                        <div class="form-group">
                            <label for="titulo">Título de la Película</label>
                            <input name="titulo" id="titulo" type="text" value="{{ old('titulo') }}" class="form-control"
                                placeholder="Título de la película" />
                        </div>
                        <div class="form-group">
                            <label for="director">¿Quién didige la película?</label>
                            <input name="director" id="director" type="text" value="{{ old('director') }}"
                                class="form-control" placeholder="Director de la película" />
                        </div>
                        <div class="form-group">
                            <label for="clasificacion">Clasificación de la película</label>
                            <select name="clasificacion" id="clasificacion" class="form-control">
                                <option disabled selected>Select...</option>
                                <option>A</option>
                                <option>B</option>
                                <option>B15</option>
                                <option>C</option>
                                <option>D</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="duracion">¿Cuánto dura la pelcicula? <small>Coloca HH:MM para registrar el tiempo
                                    que dura la película</small> </label>
                            <input name="duracion" id="duracion" type="text" value="{{ old('duracion') }}"
                                class="form-control" />
                        </div>
                        <div class="form-group">
                            <label for="imagen">Elige una imagen para la película</label>
                            <input name="imagen" type="file" class="form-control-file" id="imagen">
                        </div>
                        <div class="form-group">
                            <label for="ini_exhibicion">¿Cuánto inicia la proyección? <small>Favor de introducir la hora con
                                    el sig formato Año-Mes-Día Hora:min:seg </small></label>
                            <input name="ini_exhibicion" id="ini_exhibicion" type="datetime"
                                value="{{ old('ini_exhibicion') }}" class="form-control"
                                placeholder="AAAA-MM-DD HH:MM:SS" />
                        </div>
                        <div class="form-group">
                            <label for="fin_exhibicion">¿Cuánto termina la proyección? <small>Favor de introducir la hora
                                    con el sig formato Año-Mes-Día Hora:min:seg </small></label>
                            <input name="fin_exhibicion" id="fin_exhibicion" type="datetime"
                                value="{{ old('fin_exhibicion') }}" class="form-control"
                                placeholder="AAAA-MM-DD HH:MM:SS" />
                        </div>
                        <button class="btn btn-success" type="submit">Guardar Película</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
