<?php

namespace Database\Seeders;

use App\Models\DetalleCompra;
use Illuminate\Database\Seeder;

class DetalleCompraSeeder extends Seeder
{
    public function run(): void
    {
        DetalleCompra::factory()->count(10)->create();
    }
}
