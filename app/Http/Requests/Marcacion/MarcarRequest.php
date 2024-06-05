<?php

namespace App\Http\Requests\Marcacion;

use Illuminate\Foundation\Http\FormRequest;

class MarcarRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'codigo' => 'required|string|exists:qr_codigos,codigo',
        ];
    }

    public function messages()
    {
        return [
            'codigo.required' => 'El código es requerido',
            'codigo.string' => 'El código debe ser un texto',
            'codigo.exists' => 'El código no es valido',
        ];
    }
}
