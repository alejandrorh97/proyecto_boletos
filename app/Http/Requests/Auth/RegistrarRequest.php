<?php

namespace App\Http\Requests\Auth;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class RegistrarRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'fecha_nacimiento' => Carbon::createFromFormat('Y/m/d', $this->fecha_nacimiento)->format('d-m-Y'),
        ]);
    }

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
