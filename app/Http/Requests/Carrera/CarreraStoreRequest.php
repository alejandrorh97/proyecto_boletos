<?php

namespace App\Http\Requests\Carrera;

use Illuminate\Foundation\Http\FormRequest;

class CarreraStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'circuito_id' => 'required|exists:circuitos,id',
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha'       => 'required|date_format:d-m-Y H:i:s',
            'lugar'       => 'required|string|max:255',
            'entradas'    => 'array|required',
            'entradas.*'  => 'array|required',
            'entradas.*.tipo_entrada' => 'required|string|max:255',
            'entradas.*.sector'       => 'required|string|max:255',
            'entradas.*.precio'       => 'required|numeric',
            'entradas.*.cantidad'     => 'required|integer',
        ];
    }
}
