<?php

namespace App\Http\Controllers;

use App\Http\Requests\Marcacion\MarcarRequest;
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
}
