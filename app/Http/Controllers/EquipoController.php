<?php

namespace App\Http\Controllers;

use App\Http\Requests\Equipo\EquipoIndexRequest;
use App\Http\Requests\Equipo\EquipoStoreRequest;
use App\Http\Requests\Equipo\EquipoUpdateRequest;
use App\Http\Resources\Equipo\EquipoIndexResource;
use App\Models\Equipo;

class EquipoController extends Controller
{
    public function index(EquipoIndexRequest $request)
    {
        $filters = $request->validated();
        $equipos = Equipo::query()->filter($filters)->withPagination();

        return EquipoIndexResource::collection($equipos);
    }

    public function store(EquipoStoreRequest $request)
    {
        $equipo = Equipo::create($request->validated());

        return new EquipoIndexResource($equipo);
    }

    public function show(Equipo $equipo)
    {
        return new EquipoIndexResource($equipo);
    }

    public function update(EquipoUpdateRequest $request, Equipo $equipo)
    {
        $equipo->update($request->validated());

        return new EquipoIndexResource($equipo);
    }

    public function destroy(Equipo $equipo)
    {
        $equipo->delete();

        return response()->noContent();
    }
}
