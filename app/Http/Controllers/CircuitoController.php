<?php

namespace App\Http\Controllers;

use App\Http\Requests\Circuito\CircuitoIndexRequest;
use App\Http\Requests\Circuito\CircuitoStoreRequest;
use App\Http\Requests\Circuito\CircuitoUpdateRequest;
use App\Http\Resources\Circuito\CircuitoIndexResource;
use App\Models\Circuito;

class CircuitoController extends Controller
{
    public function index(CircuitoIndexRequest $request)
    {
        $filters   = $request->validated();
        $circuitos = Circuito::query()->filter($filters)->withPagination();

        return CircuitoIndexResource::collection($circuitos);
    }

    public function store(CircuitoStoreRequest $request)
    {
        $circuito = Circuito::create($request->validated());

        return new CircuitoIndexResource($circuito);
    }

    public function show(Circuito $circuito)
    {
        return new CircuitoIndexResource($circuito);
    }

    public function update(CircuitoUpdateRequest $request, Circuito $circuito)
    {
        $circuito->update($request->validated());

        return new CircuitoIndexResource($circuito);
    }

    public function destroy(Circuito $circuito)
    {
        $circuito->delete();

        return response()->noContent();
    }
}
