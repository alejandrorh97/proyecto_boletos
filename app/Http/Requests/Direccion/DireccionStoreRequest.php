<?php

namespace App\Http\Requests\Direccion;

use Illuminate\Foundation\Http\FormRequest;

class DireccionStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'pais'          => 'required|string',
            'estado'        => 'required|string',
            'ciudad'        => 'required|string',
            'linea_1'       => 'required|string',
            'linea_2'       => 'nullable|string',
            'casa'          => 'required|string',
            'codigo_postal' => 'required|string',
        ];
    }
}
