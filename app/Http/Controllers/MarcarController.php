<?php

namespace App\Http\Controllers;

use App\Http\Requests\Marcacion\MarcarRequest;
use App\Http\Resources\Marcar\MisMarcacionesResource;
use App\Models\QRCodigo;

class MarcarController extends Controller
{
    public function marcar(MarcarRequest $request)
    {
        $codigo = QRCodigo::query()
            ->select()
            ->where('codigo', $request->codigo)
            ->first();

        $persona = auth()->user()->persona;

        $persona->marcaciones()->create([
            'codigo_id' => $codigo->id,
        ]);
    }

    public function misMarcaciones()
    {
        $persona = auth()->user()->persona;

        $marcaciones = $persona->load('marcaciones.codigo', 'marcaciones')->marcaciones;

        return MisMarcacionesResource::collection($marcaciones);
    }
}
