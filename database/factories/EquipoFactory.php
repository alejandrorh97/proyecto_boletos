<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EquipoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
        ];
    }
}
