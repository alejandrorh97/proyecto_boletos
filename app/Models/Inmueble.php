<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model
{
    use HasFactory;

    protected $fillable = [
        'departamento',
        'municipio',
        'residencia',
        'calle',
        'poligono',
        'numero',
        'propietario_id',
    ];

    public function propietario()
    {
        return $this->belongsTo(Propietario::class);
    }
}
