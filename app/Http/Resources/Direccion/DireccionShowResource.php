<?php

namespace App\Http\Resources\Direccion;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DireccionShowResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'pais' => $this->pais,
            'estado' => $this->estado,
            'ciudad' => $this->ciudad,
            'linea_1' => $this->linea_1,
            'linea_2' => $this->linea_2,
            'casa' => $this->casa,
            'codigo_postal' => $this->codigo_postal,
        ];
    }
}
