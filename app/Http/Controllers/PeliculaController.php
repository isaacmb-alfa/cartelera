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

        
        auth()->user()->cartelera()->create([
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
        $pelicula = $pelicula[0];
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
        $url = $request['url'];
        $pelicula = Pelicula::where('url', $url)->get(); 
        $pelicula = $pelicula[0];

         $data = $request->validate([
            'titulo' => 'required|min:10',
            'director' => 'required|min:10',
            'duracion' => 'required',
            'imagen' => 'required',
            'clasificacion' => 'required',
            'ini_exhibicion' => 'required',
            'fin_exhibicion' => 'required',

        ]);
        // return $pelicula->imagen;
        if(($pelicula->imagen !== $data['imagen']) && is_readable(public_path('storage/'. $pelicula->imagen)))
        {
            unlink(public_path('storage/'.$pelicula->imagen));
            
        }

        $ruta_imagen = $request['imagen']->store('peliculas', 'public');

        //creamos el slug del titulo para la url
        $url = Str::slug($data['titulo']);

        $pelicula->titulo = $data['titulo'];
        $pelicula->director = $data['director'];
        $pelicula->duracion = $data['duracion'];
        $pelicula->imagen = $ruta_imagen;
        $pelicula->url = $url;
        $pelicula->clasificacion = $data['clasificacion'];
        $pelicula->ini_exhibicion = $data['ini_exhibicion'];
        $pelicula->fin_exhibicion = $data['fin_exhibicion'];

        $pelicula->save();

        return redirect()->route('cartelera.index');

        
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelicula  $pelicula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelicula $pelicula, Request $request )
    {
        // return $pelicula;
        $url = $request['url'];
        $pelicula = Pelicula::where('url', $url)->get(); 
        $pelicula = $pelicula[0];
        
        if(is_readable(public_path('storage/'. $pelicula->imagen))) 
        {
            unlink(public_path('storage/'. $pelicula->imagen));
        }

        $pelicula->delete();

        return redirect(route('cartelera.index'));
    }
}
