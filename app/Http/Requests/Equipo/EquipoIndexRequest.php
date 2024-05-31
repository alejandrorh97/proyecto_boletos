<?php

namespace App\Http\Requests\Equipo;

use Illuminate\Foundation\Http\FormRequest;

class EquipoIndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nombre' => 'string',
        ];
    }
}
