<?php

namespace App\Http\Requests\Equipo;

use Illuminate\Foundation\Http\FormRequest;

class EquipoUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nombre' => 'string|unique:equipos,nombre',
        ];
    }
}
