<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $table = 'direcciones';

    protected $fillable = [
        'pais',
        'estado',
        'ciudad',
        'linea_1',
        'linea_2',
        'casa',
        'codigo_postal',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
