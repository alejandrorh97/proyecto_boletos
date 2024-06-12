<?php

namespace App\Http\Resources\Inmueble;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InmuebleIndexResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'departamento' => $this->departamento,
            'municipio'    => $this->municipio,
            'residencia'   => $this->residencia,
            'calle'        => $this->calle,
            'poligono'     => $this->poligono,
            'numero'       => $this->numero,
            'propietario'  => $this->propietario ? $this->propietario->nombres . ' ' . $this->propietario->apellidos : 'Sin propietario',
        ];
    }
}
