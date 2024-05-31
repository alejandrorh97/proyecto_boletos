<?php

namespace Database\Factories;

use App\Models\Carrera;
use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompraFactory extends Factory
{
    public function definition(): array
    {
        return [
            'persona_id' => Persona::inRandomOrder()->first()->id ?? Persona::factory(),
            'carrera_id' => Carrera::inRandomOrder()->first()->id ?? Carrera::factory(),
            'total' => $this->faker->randomFloat(2, 0, 999.99),
        ];
    }
}
