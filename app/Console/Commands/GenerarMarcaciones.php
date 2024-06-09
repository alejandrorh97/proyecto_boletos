<?php

namespace App\Console\Commands;

use App\Models\QRCodigo;
use App\Models\User;
use Illuminate\Console\Command;

class GenerarMarcaciones extends Command
{
    protected $signature = 'marcaciones:generar';

    protected $description = 'Command description';

    public function handle()
    {
        $now = now();
        $this->info('Generating marcaciones...');
        $usuario = User::query()
            ->where('email', 'admin@example.com')
            ->first()
            ->persona;
        $codigos = QRCodigo::query()
            ->whereDate('created_at', '<=', $now)
            ->get();

        $usuario->marcaciones()->delete();

        foreach ($codigos as $codigo) {
            $hora = $codigo->tipo === 'entrada' ? '14:00:00' : '00:00:00';
            $fecha = $codigo->created_at->format('Y-m-d') . ' ' . $hora;

            $usuario->marcaciones()->create([
                'codigo_id' => $codigo->id,
                'created_at' => $fecha,
                'updated_at' => $fecha,
            ]);
        }

        $this->info('Marcaciones generadas correctamente.');
    }
}
