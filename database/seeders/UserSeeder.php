<?php

namespace Database\Seeders;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $personas = Persona::all();

        foreach ($personas as $persona) {
            User::factory()->create([
                'persona_id' => $persona->id,
                'name' => $persona->nombre . ' ' . $persona->apellido,
                'email' => $persona->email,
            ]);
        }
    }
}
