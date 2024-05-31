<?php

namespace Database\Seeders;

use App\Models\Carrera;
use Illuminate\Database\Seeder;

class EntradaSeeder extends Seeder
{
    public function run(): void
    {
        $carreras = Carrera::all();

        foreach ($carreras as $carrera) {
            $carrera->entradas()->create([
                'tipo_entrada' => 'General',
                'sector' => 'Norte',
                'precio' => 50.00,
                'cantidad' => 100,
            ]);

            $carrera->entradas()->create([
                'tipo_entrada' => 'General',
                'sector' => 'Sur',
                'precio' => 50.00,
                'cantidad' => 100,
            ]);

            $carrera->entradas()->create([
                'tipo_entrada' => 'VIP',
                'sector' => 'Norte',
                'precio' => 100.00,
                'cantidad' => 50,
            ]);

            $carrera->entradas()->create([
                'tipo_entrada' => 'VIP',
                'sector' => 'Sur',
                'precio' => 100.00,
                'cantidad' => 50,
            ]);
        }
    }
}
