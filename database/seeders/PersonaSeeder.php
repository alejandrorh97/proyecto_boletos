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
            'email' => 'alejandrorrh97@gmail.com',
            'telefono' => '1234567890',
            'fecha_nacimiento' => '1997-11-29',
            'genero' => 'masculino',
        ]);
        Persona::factory(10)->create();
    }
}
