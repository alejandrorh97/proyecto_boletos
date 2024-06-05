<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QRCodigoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'codigo' => $this->faker->uuid,
            'tipo'   => $this->faker->randomElement(['entrada', 'salida']),
        ];
    }
}
