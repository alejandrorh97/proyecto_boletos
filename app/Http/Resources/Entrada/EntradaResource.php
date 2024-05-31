<?php

namespace App\Http\Resources\Entrada;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EntradaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'tipo_entrada' => $this->tipo_entrada,
            'sector'       => $this->sector,
            'precio'       => $this->precio,
            'cantidad'     => $this->cantidad,
        ];
    }
}
