<?php

namespace App\Http\Requests\Circuito;

use Illuminate\Foundation\Http\FormRequest;

class CircuitoStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'longitud'    => 'required|numeric',
            'tipo'        => 'required|string|in:urbano,rural,mixto',
        ];
    }
}
