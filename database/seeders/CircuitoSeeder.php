<?php

namespace Database\Seeders;

use App\Models\Circuito;
use Illuminate\Database\Seeder;

class CircuitoSeeder extends Seeder
{
    public function run(): void
    {
        $circuitos = [
            [
                'nombre' => 'Albert Park',
                'descripcion' => 'Circuito urbano en Melbourne, Australia',
                'longitud' => 5303,
                'tipo' => 'urbano',
            ],
            [
                'nombre' => 'Bahrain International Circuit',
                'descripcion' => 'Circuito en Sakhir, Baréin',
                'longitud' => 5412,
                'tipo' => 'urbano',
            ],
            [
                'nombre' => 'Shanghai International Circuit',
                'descripcion' => 'Circuito en Shanghái, China',
                'longitud' => 5451,
                'tipo' => 'urbano',
            ],
            [
                'nombre' => 'Circuit de Barcelona-Catalunya',
                'descripcion' => 'Circuito en Montmeló, España',
                'longitud' => 4655,
                'tipo' => 'urbano',
            ],
            [
                'nombre' => 'Circuit de Monaco',
                'descripcion' => 'Circuito urbano en Montecarlo, Mónaco',
                'longitud' => 3337,
                'tipo' => 'urbano',
            ],
            [
                'nombre' => 'Baku City Circuit',
                'descripcion' => 'Circuito urbano en Bakú, Azerbaiyán',
                'longitud' => 6003,
                'tipo' => 'urbano',
            ],
            [
                'nombre' => 'Circuit Gilles Villeneuve',
                'descripcion' => 'Circuito en Montreal, Canadá',
                'longitud' => 4361,
                'tipo' => 'urbano',
            ],
            [
                'nombre' => 'Red Bull Ring',
                'descripcion' => 'Circuito en Spielberg, Austria',
                'longitud' => 4318,
                'tipo' => 'urbano',
            ],
            [
                'nombre' => 'Silverstone Circuit',
                'descripcion' => 'Circuito en Silverstone, Reino Unido',
                'longitud' => 5891,
                'tipo' => 'urbano',
            ],
        ];

        foreach ($circuitos as $circuito) {
            Circuito::create($circuito);
        }
    }
}
