<?php

namespace Database\Factories;
use App\Models\Pelicula;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeliculaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create();
        $titulo = $faker->randomElement(['Animales Fantásticos 3', 'Sonic 2', 'Tipos Malos']);
        $tituloCompleto = $titulo . ' ' . Str::random(3);
        $url = Str::slug($tituloCompleto);
        $fin_ex = $faker->dateTimeBetween($startDate = 'now', $endDate = '+3 years');
        $ini_ex = $faker->dateTimeBetween($startDate = '+15 days', $endDate =  $fin_ex);
        return [
            
            //
            'titulo' => $tituloCompleto, 
            'url' => $url, 
            'director' => $this->faker->name(), 
            'duracion' => $this->faker->randomElement(['01:55:00','01:35:00','02:10:00']), 
            'imagen' => '1644804364.jpg', 
            'clasificacion' => $this->faker->randomElement(['A', 'B', 'B15', 'C', 'D']), 
            'ini_exhibicion' => $ini_ex,
            'fin_exhibicion' => $fin_ex
        ];
    }
}
