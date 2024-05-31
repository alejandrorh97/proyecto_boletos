<?php

namespace App\Http\Requests\Circuito;

use Illuminate\Foundation\Http\FormRequest;

class CircuitoIndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nombre' => 'string',
            'tipo' => 'string',
        ];
    }
}
