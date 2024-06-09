<?php

namespace App\Http\Controllers;

use App\Http\Requests\Marcacion\MarcarRequest;
use App\Http\Resources\Marcar\MisMarcacionesResource;
use App\Models\{Marcacion, QRCodigo};
class MarcarController extends Controller
{
    public function marcar(MarcarRequest $request)
    {
        $codigo = QRCodigo::query()
            ->select()
            ->where('codigo', $request->codigo)
            ->first();

        $persona = auth()->user()->persona;

        if (!$persona->marcaciones()->where('codigo_id', $codigo->id)->exists()) {
            $persona->marcaciones()->create([
                'codigo_id' => $codigo->id,
            ]);
        }
    }

    public function misMarcaciones()
    {
        $persona = auth()->user()->persona;

        $marcaciones = Marcacion::query()
            ->where('persona_id', $persona->id)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return MisMarcacionesResource::collection($marcaciones);
    }
}
