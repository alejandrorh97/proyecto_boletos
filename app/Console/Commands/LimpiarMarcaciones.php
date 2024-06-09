<?php

namespace App\Console\Commands;

use App\Models\Persona;
use Illuminate\Console\Command;

class LimpiarMarcaciones extends Command
{
    protected $signature = 'marcaciones:limpiar {correo}';

    protected $description = 'Command description';


    public function handle()
    {
        $correo = $this->argument('correo');

        $persona = Persona::where('email', $correo)->first();

        $persona->marcaciones()->delete();
    }
}
