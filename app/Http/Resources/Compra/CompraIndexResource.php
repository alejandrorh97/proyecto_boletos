<?php

namespace App\Http\Resources\Compra;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompraIndexResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'metodo_pago'  => $this->metodo_pago,
            'total'        => $this->total,
            'fecha_compra' => Carbon::parse($this->fecha_compra)->format('d/m/Y H:i:s'),
            'detalles'     => $this->detallesCompra->map(function ($detalle) {
                return [
                    'id'       => $detalle->id,
                    'cantidad' => $detalle->cantidad,
                    'subtotal' => $detalle->subtotal,
                    'entrada'  => $detalle->entrada->tipo_entrada . ' ' . $detalle->entrada->sector,
                ];
            }),
            'carrera' => $this->carrera->nombre,
        ];
    }
}
