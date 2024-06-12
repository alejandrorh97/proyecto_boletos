<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'genero',
        'telefono',
        'email',
    ];

    public function inmuebles()
    {
        return $this->hasMany(Inmueble::class);
    }

    public function scopeBusqueda($query, $busqueda)
    {
        if ($busqueda) {
            return $query->where('nombres', 'like', "%$busqueda%")
                ->orWhere('apellidos', 'like', "%$busqueda%")
                ->orWhere('email', 'like', "%$busqueda%");
        }
    }
}
