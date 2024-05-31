<?php

namespace App\Http\Requests\Carrera;

use Illuminate\Foundation\Http\FormRequest;

class CarreraUpdateRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'circuito_id' => 'exists:circuitos,id',
            'nombre'      => 'string|max:255',
            'descripcion' => 'string',
            'fecha'       => 'date_format:d-m-Y H:i:s',
            'lugar'       => 'string|max:255',
        ];
    }
}
