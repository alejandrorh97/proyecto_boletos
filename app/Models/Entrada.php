<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $fillable = [
        'carrera_id',
        'tipo_entrada',
        'sector',
        'precio',
        'cantidad',
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
}
