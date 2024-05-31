<?php

namespace App\Http\Requests\Compra;

use App\Rules\Entrada\CheckEntrada;
use Illuminate\Foundation\Http\FormRequest;

class CompraStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'carrera_id'                    => 'required|integer|exists:carreras,id',
            'metodo_pago'                   => 'required|array',
            'metodo_pago.numero_tarjeta'    => 'required|string',
            'metodo_pago.fecha_vencimiento' => 'required|date_format:m/y',
            'metodo_pago.codigo_seguridad'  => 'required||size:3',
            'metodo_pago.nombre_tarjeta'    => 'required|string',
            'entradas'                      => [
                'required',
                'array',
                'min:1',
                new CheckEntrada,
            ],
        ];
    }
}
