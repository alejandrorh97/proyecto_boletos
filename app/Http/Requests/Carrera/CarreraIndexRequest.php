<?php

namespace App\Http\Requests\Carrera;

use Illuminate\Foundation\Http\FormRequest;

class CarreraIndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'fecha_inicio' => 'required_with:fecha_fin|date|date_format:d-m-Y|before_or_equal:fecha_fin',
            'fecha_fin'    => 'required_with:fecha_inicio|date|date_format:d-m-Y|after_or_equal:fecha_inicio',
            'busqueda'     => 'nullable|string',
            'page'         => 'nullable|integer',
            'perPage'      => 'nullable|integer',
        ];
    }
}
