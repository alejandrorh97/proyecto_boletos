<?php

namespace App\Console\Commands;

use App\Models\QRCodigo;
use Illuminate\Console\Command;

class GenerarCodigosQR extends Command
{
    protected $signature = 'qr:generar';

    protected $description = 'Generar códigos QR para marcar entrada y salida de empleados.';

    public function handle()
    {
        $this->info('Generando códigos QR...');
        $now = now();

        for ($i = 0; $i < 30; $i++) {
            QRCodigo::factory()->create([
                'tipo'       => 'entrada',
                'created_at' => $now,
                'updated_at' => $now,
            ]);
            QRCodigo::factory()->create([
                'tipo'       => 'salida',
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            $this->info('Códigos QR generados para ' . $now->format('d-m-Y'));

            $now->addDay();
        }

        $this->info('Códigos QR generados correctamente.');
    }
}
