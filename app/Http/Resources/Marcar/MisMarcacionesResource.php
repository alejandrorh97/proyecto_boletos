<?php

namespace App\Http\Resources\Marcar;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MisMarcacionesResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'     => $this->id,
            'tipo'   => $this->codigo->tipo,
            'fecha'  => Carbon::parse($this->created_at, 'UTC')->setTimezone('America/El_Salvador')->format('H:i:s d-m-Y'),
        ];
    }
}
