<?php

namespace App\Http\Requests\Propietario;

use Illuminate\Foundation\Http\FormRequest;

class PropietarioCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nombres'          => 'required|string',
            'apellidos'        => 'required|string',
            'fecha_nacimiento' => 'required|date|date_format:Y-m-d',
            'genero'           => 'required|string|in:H,M,O',
            'telefono'         => 'required|string',
            'email'            => 'required|email|unique:propietarios,email',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'El email ya se encuentra registrado',
        ];
    }
}
