<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pelicula $pelicula)
    {
        //
        $peliculas = Pelicula::get();
        return view('cartelera.index', compact('peliculas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cartelera.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       
        $url = Str::slug($request->titulo);
        $data = $request->validate([
            'titulo' => 'required|min:10',
            'director' => 'required|min:10',
            'duracion' => 'required',
            'imagen' => 'required',
            'clasificacion' => 'required',
            'ini_exhibicion' => 'required',
            'fin_exhibicion' => 'required',

        ]);

        $ruta_imagen = $request['imagen']->store('peliculas', 'public');

        
        auth()->user()->pelicula()->create([
            'titulo' => $data['titulo'],
            'director' => $data['director'],
            'duracion' => $data['duracion'],
            'url' => $url,
            'imagen' => $ruta_imagen,
            'clasificacion' => $data['clasificacion'],
            'ini_exhibicion' => $data['ini_exhibicion'],
            'fin_exhibicion' => $data['fin_exhibicion'], 
        ]);

        return back()->with('message', 'Película guardada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function show(Pelicula $pelicula)
    {
        //
        return view('cartelera.show',compact('pelicula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelicula $pelicula, Request $request )
    {
        //
         $url = $request['url'];
        // return dd($request['url']);
        $pelicula = Pelicula::where('url', $url)->get(); 
        // return $pelicula;
        // $pelicula = Pelicula::where(['url']);
        return view('cartelera.edit', compact('pelicula'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelicula $pelicula)
    {
        //
    }
}
