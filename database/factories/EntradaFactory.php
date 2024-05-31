<?php

namespace Database\Factories;

use App\Models\Carrera;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntradaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'carrera_id' => Carrera::inRandomOrder()->first()->id ?? Carrera::factory(),
            'tipo_entrada' => $this->faker->word,
            'sector' => $this->faker->word,
            'precio' => $this->faker->randomFloat(2, 0, 999.99),
            'cantidad' => $this->faker->numberBetween(1, 100),
        ];
    }
}
