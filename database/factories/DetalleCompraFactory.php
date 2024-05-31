<?php

namespace Database\Factories;

use App\Models\Compra;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetalleCompraFactory extends Factory
{

    public function definition(): array
    {
        $compra = Compra::inRandomOrder()->first() ?? Compra::factory()->create();

        return [
            'compra_id' => $compra->id,
            'entrada_id' => $compra->carrera->entradas->random()->id,
            'cantidad' => $this->faker->numberBetween(1, 10),
            'subtotal' => $this->faker->randomFloat(2, 0, 999.99),
            'observaciones' => $this->faker->sentence,
        ];
    }
}
