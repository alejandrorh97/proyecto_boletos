<?php

namespace App\Http\Controllers;

use App\Http\Requests\Direccion\DireccionStoreRequest;
use App\Http\Resources\Direccion\DireccionShowResource;

class DireccionController extends Controller
{
    public function show()
    {
        $user      = auth()->user();
        $direccion = $user->persona->direcciones->first();

        return DireccionShowResource::make($direccion);
    }

    public function store(DireccionStoreRequest $request)
    {
        $user = auth()->user();
        $user->persona->direcciones()->create($request->validated());

        return DireccionShowResource::make($user->persona->direcciones->first());
    }
}
