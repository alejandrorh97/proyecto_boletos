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
        $admins = [
            'admin_AR@mail.com',
            'admin_DP@mail.com',
            'admin_HG@mail.com',
            'admin@mail.com'
        ];

        $personas = Persona::all();

        foreach ($personas as $persona) {
            if (in_array($persona->email, $admins)) {
                User::factory()->create([
                    'persona_id' => $persona->id,
                    'name' => $persona->nombre . ' ' . $persona->apellido,
                    'email' => $persona->email,
                    'role' => 'admin',
                ]);
                continue;
            }

            User::factory()->create([
                'persona_id' => $persona->id,
                'name' => $persona->nombre . ' ' . $persona->apellido,
                'email' => $persona->email,
            ]);
        }
    }
}
