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

        QRCodigo::factory()->create([
            'tipo' => 'entrada',
        ]);

        QRCodigo::factory()->create([
            'tipo' => 'salida',
        ]);

        $this->info('Códigos QR generados correctamente.');
    }
}
