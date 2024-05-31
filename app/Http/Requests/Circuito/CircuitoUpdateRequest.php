<?php

namespace App\Http\Requests\Circuito;

use Illuminate\Foundation\Http\FormRequest;

class CircuitoUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nombre'      => 'string|max:255',
            'descripcion' => 'string|max:255',
            'longitud'    => 'numeric',
            'tipo'        => 'string|in:urbano,rural,mixto',
        ];
    }
}
