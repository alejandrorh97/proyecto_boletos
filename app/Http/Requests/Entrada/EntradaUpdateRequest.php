<?php

namespace App\Http\Requests\Entrada;

use Illuminate\Foundation\Http\FormRequest;

class EntradaUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'tipo_entrada' => 'string',
            'sector'       => 'string',
            'precio'       => 'numeric',
            'cantidad'     => 'integer',
        ];
    }
}
