<?php

namespace App\Http\Controllers;

use App\Http\Requests\Inmueble\InmuebleCreateRequest;
use App\Models\Inmueble;
use App\Models\Propietario;

class InmuebleController extends Controller
{
    public function index(Propietario $propietario)
    {
        $inmuebles = $propietario->inmuebles;

        return json_encode([
            'data' => $inmuebles,
        ]);
    }

    public function store(InmuebleCreateRequest $request)
    {
        Inmueble::create($request->validated());

        return json_encode([
            'status' => 'success',
            'message' => 'Inmueble creado exitosamente',
        ]);
    }
}
