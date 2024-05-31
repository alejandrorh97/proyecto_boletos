<?php

namespace App\Http\Requests\Entrada;

use Illuminate\Foundation\Http\FormRequest;

class EntradaStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tipo_entrada' => 'required|string',
            'sector'       => 'required|string',
            'precio'       => 'required|numeric',
            'cantidad'     => 'required|integer',
        ];
    }
}
