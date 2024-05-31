<?php

namespace Database\Seeders;

use App\Models\Equipo;
use Illuminate\Database\Seeder;

class EquipoSeeder extends Seeder
{
    public function run(): void
    {
        $equipos = [
            'Mercedes',
            'Red Bull',
            'Ferrari',
            'McLaren',
            'Aston Martin',
            'Alpine',
            'AlphaTauri',
            'Alfa Romeo',
            'Haas',
            'Williams',
        ];

        foreach ($equipos as $equipo) {
            Equipo::create([
                'nombre' => $equipo,
            ]);
        }
    }
}
