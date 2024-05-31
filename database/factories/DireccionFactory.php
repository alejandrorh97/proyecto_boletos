<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class DireccionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'persona_id'    => Persona::inRandomOrder()->first()->id ?? Persona::factory(),
            'pais'          => $this->faker->country,
            'estado'        => $this->faker->state,
            'ciudad'        => $this->faker->city,
            'linea_1'       => $this->faker->streetAddress,
            'linea_2'       => $this->faker->secondaryAddress,
            'casa'          => $this->faker->buildingNumber,
            'codigo_postal' => $this->faker->postcode,
        ];
    }
}
