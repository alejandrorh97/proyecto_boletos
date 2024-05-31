<?php

namespace Database\Factories;

use App\Models\Circuito;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarreraFactory extends Factory
{
    public function definition(): array
    {
        return [
            'circuito_id' => Circuito::inRandomOrder()->first()->id ?? Circuito::factory(),
            'nombre' => $this->faker->name,
            'descripcion' => $this->faker->text,
            'fecha' => $this->faker->dateTime,
            'lugar' => $this->faker->city,
        ];
    }
}
