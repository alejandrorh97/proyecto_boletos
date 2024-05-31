<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CircuitoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            'descripcion' => $this->faker->sentence,
            'longitud' => $this->faker->numberBetween(1, 100),
            'tipo' => $this->faker->randomElement(['urbano', 'rural', 'mixto']),
        ];
    }
}
