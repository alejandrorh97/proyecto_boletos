<?php

namespace Database\Seeders;

use App\Models\{Persona, User};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admins = [
            'admin_AR@mail.com',
            'admin_DP@mail.com',
            'admin_HG@mail.com',
            'admin@mail.com',
        ];

        $personas = Persona::all();

        foreach ($personas as $persona) {
            if (in_array($persona->email, $admins)) {
                User::factory()->create([
                    'persona_id' => $persona->id,
                    'name'       => $persona->nombre . ' ' . $persona->apellido,
                    'email'      => $persona->email,
                    'role'       => 'admin',
                ]);

                continue;
            }

            if ($persona->email === 'admin@example.com') {
                User::factory()->create([
                    'persona_id' => $persona->id,
                    'name'       => $persona->nombre . ' ' . $persona->apellido,
                    'email'      => $persona->email,
                    'role'       => 'admin',
                    'password'   => Hash::make('admin')
                ]);

                continue;
            }

            User::factory()->create([
                'persona_id' => $persona->id,
                'name'       => $persona->nombre . ' ' . $persona->apellido,
                'email'      => $persona->email,
            ]);
        }
    }
}
