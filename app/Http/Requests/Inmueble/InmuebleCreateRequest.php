<?php

namespace App\Http\Requests\Inmueble;

use Illuminate\Foundation\Http\FormRequest;

class InmuebleCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'departamento'   => 'required|string',
            'municipio'      => 'required|string',
            'residencia'     => 'required|string',
            'calle'          => 'required|string',
            'poligono'       => 'required|string',
            'numero'         => 'required|string',
            'propietario_id' => 'required|exists:propietarios,id',
        ];
    }

    public function messages()
    {
        return [
            'propietario_id.exists' => 'El propietario no existe',
        ];
    }
}
