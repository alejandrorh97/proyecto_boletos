<?php

namespace App\Http\Resources\Carrera;

use App\Http\Resources\Circuito\CircuitoIndexResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarreraIndexResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'circuito'    => CircuitoIndexResource::make($this->circuito),
            'nombre'      => $this->nombre,
            'descripcion' => $this->descripcion,
            'fecha'       => $this->fecha,
            'lugar'       => $this->lugar,
        ];
    }
}
