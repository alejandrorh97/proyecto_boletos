<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = [
        'carrera_id',
        'persona_id',
        'entrada_id',
        'cantidad',
        'total',
        'fecha_compra'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }

    public function detallesCompra()
    {
        return $this->hasMany(DetalleCompra::class);
    }
}
