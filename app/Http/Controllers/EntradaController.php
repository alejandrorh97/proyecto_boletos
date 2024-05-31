<?php

namespace App\Http\Controllers;

use App\Http\Requests\Entrada\EntradaStoreRequest;
use App\Http\Requests\Entrada\EntradaUpdateRequest;
use App\Http\Resources\Entrada\EntradaResource;
use App\Models\Carrera;
use App\Models\Entrada;

class EntradaController extends Controller
{
    public function store(Carrera $carrera, EntradaStoreRequest $request)
    {
        $entrada = $carrera->entradas()->create($request->validated());

        return EntradaResource::make($entrada);
    }

    public function update(Entrada $entrada, EntradaUpdateRequest $request)
    {
        $entrada->update($request->validated());

        return EntradaResource::make($entrada);
    }

    public function destroy(Entrada $entrada)
    {
        $entrada->delete();

        return response()->noContent();
    }
}
