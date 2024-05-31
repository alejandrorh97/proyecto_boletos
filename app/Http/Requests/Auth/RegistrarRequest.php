<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegistrarRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nombre'           => 'required|string',
            'apellido'         => 'required|string',
            'email'            => 'required|email|unique:personas,email',
            'password'         => 'required|string',
            'fecha_nacimiento' => 'required|date|date_format:d-m-Y',
            'genero'           => 'required|string',
        ];
    }
}
