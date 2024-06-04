<?php

namespace Database\Seeders;

use App\Models\Persona;
use Illuminate\Database\Seeder;

class PersonaSeeder extends Seeder
{
    public function run(): void
    {
        Persona::create([
            'nombre' => 'Alejandro',
            'apellido' => 'Rivas',
            'email' => 'admin_AR@mail.com',
            'telefono' => '1234567890',
            'fecha_nacimiento' => '2000-01-01',
            'genero' => 'hombre',
        ]);

        Persona::create([
            'nombre' => 'Daniel',
            'apellido' => 'Parrillas',
            'email' => 'admin_DP@mail.com',
            'telefono' => '1234567890',
            'fecha_nacimiento' => '2000-01-01',
            'genero' => 'hombre',
        ]);

        Persona::create([
            'nombre' => 'Hugo',
            'apellido' => 'Garcia',
            'email' => 'admin_HG@mail.com',
            'telefono' => '1234567890',
            'fecha_nacimiento' => '2000-01-01',
            'genero' => 'hombre',
        ]);

        Persona::create([
            'nombre' => 'Admin',
            'apellido' => 'Admin',
            'email' => 'admin@mail.com',
            'telefono' => '1234567890',
            'fecha_nacimiento' => '2000-01-01',
            'genero' => 'hombre',
        ]);

        Persona::factory(10)->create();
    }
}
