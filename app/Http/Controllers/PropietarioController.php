<?php

namespace App\Http\Controllers;

use App\Http\Requests\Propietario\PropietarioCreateRequest;
use App\Http\Resources\Propietario\PropietarioResource;
use App\Models\Propietario;
use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->get('busqueda');
        $propietarios = Propietario::query()
            ->busqueda($busqueda)->get();

        return PropietarioResource::collection($propietarios);
    }

    public function store(PropietarioCreateRequest $request)
    {
        $propietario = Propietario::create($request->validated());

        return json_encode([
            'status' => 'success',
            'message' => 'Propietario creado exitosamente',
        ]);
    }
}
