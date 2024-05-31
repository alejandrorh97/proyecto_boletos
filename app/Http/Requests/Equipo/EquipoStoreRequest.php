<?php

namespace App\Http\Requests\Equipo;

use Illuminate\Foundation\Http\FormRequest;

class EquipoStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|unique:equipos,nombre',
        ];
    }
}
