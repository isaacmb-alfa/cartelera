<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'url';
    }

    protected $fillable = [
            'titulo', 
            'url', 
            'director', 
            'duracion', 
            'imagen', 
            'clasificacion', 
            'ini_exhibicion', 
            'fin_exhibicion'
    ];

}
