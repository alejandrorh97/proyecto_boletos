<?php

namespace App\Http\Resources\Perfil;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PerfilResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'               => $this->id,
            'nombre'           => $this->nombre,
            'apellido'         => $this->apellido,
            'correo'           => $this->email,
            'telefono'         => $this->telefono,
            'fecha_nacimiento' => Carbon::parse($this->fecha_nacimiento)->format('d-m-Y'),
            'genero'           => $this->genero,
        ];
    }
}
