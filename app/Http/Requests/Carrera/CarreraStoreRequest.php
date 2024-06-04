<?php

namespace App\Http\Requests\Carrera;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CarreraStoreRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'fecha' => Carbon::parse($this->fecha)->format('d-m-Y H:i:s'),
            'circuito_id' => 1,
            'descripcion' => "GP de $this->lugar \nLugar: $this->lugar \nCircuito: $this->circuito",
            'entradas'    => [
                [
                    'tipo_entrada' => 'General',
                    'sector'       => 'Norte',
                    'precio'       => 25,
                    'cantidad'     => 1000,
                ],
                [
                    'tipo_entrada' => 'General',
                    'sector'       => 'Sur',
                    'precio'       => 25,
                    'cantidad'     => 1000,
                ],
                [
                    'tipo_entrada' => 'VIP',
                    'sector'       => 'VIP',
                    'precio'       => 100,
                    'cantidad'     => 500,
                ],
            ],
        ]);
    }

    public function rules(): array
    {
        return [
            'circuito_id'             => 'required|exists:circuitos,id',
            'circuito'                => 'required|string|max:255',
            'nombre'                  => 'required|string|max:255',
            'descripcion'             => 'required|string',
            #validar fecha en formato Y-m-d H:i:s
            'fecha'                   => 'required|date_format:d-m-Y H:i:s',
            'lugar'                   => 'required|string|max:255',
            'entradas'                => 'array|required',
            'entradas.*'              => 'array|required',
            'entradas.*.tipo_entrada' => 'required|string|max:255',
            'entradas.*.sector'       => 'required|string|max:255',
            'entradas.*.precio'       => 'required|numeric',
            'entradas.*.cantidad'     => 'required|integer',
        ];
    }
}
