<?php

namespace App\Http\Requests\Perfil;

use Illuminate\Foundation\Http\FormRequest;

class PerfilUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nombre'           => 'required|string',
            'apellido'         => 'required|string',
            'email'            => 'required|email',
            'fecha_nacimiento' => 'required|date|date_format:d-m-Y',
            'telefono'         => 'required|string',
            'genero'           => 'required|string',
        ];
    }
}
