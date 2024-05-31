<?php

namespace App\Http\Controllers;

use App\Http\Requests\Carrera\CarreraIndexRequest;
use App\Http\Requests\Carrera\CarreraStoreRequest;
use App\Http\Requests\Carrera\CarreraUpdateRequest;
use App\Http\Resources\Carrera\CarreraIndexResource;
use App\Http\Resources\Carrera\CarreraResource;
use App\Models\Carrera;
use Carbon\Carbon;

class CarreraController extends Controller
{
    public function index(CarreraIndexRequest $request)
    {
        $filters = $request->validated();

        $carreras = Carrera::query()
            ->with('circuito')
            ->filter($filters)
            ->withPagination();

        return CarreraIndexResource::collection($carreras);
    }

    public function store(CarreraStoreRequest $request)
    {
        $data          = $request->only('circuito_id', 'nombre', 'descripcion', 'fecha', 'lugar');
        $data['fecha'] = Carbon::createFromFormat('d-m-Y H:i:s', $data['fecha']);

        $carrera = Carrera::create($data);
        $carrera->entradas()->createMany($request->entradas);

        return new CarreraResource($carrera);
    }

    public function show(Carrera $carrera)
    {
        $carrera->load('circuito');

        return new CarreraResource($carrera);
    }

    public function update(CarreraUpdateRequest $request, Carrera $carrera)
    {
        $data          = $request->validated();
        $data['fecha'] = Carbon::createFromFormat('d-m-Y H:i:s', $data['fecha']);

        $carrera->update($data);

        return new CarreraResource($carrera);
    }

    public function destroy(Carrera $carrera)
    {
        $carrera->delete();

        return response()->noContent();
    }
}
