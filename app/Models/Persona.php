<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'fecha_nacimiento',
        'genero',
    ];

    public function usuario()
    {
        return $this->hasOne(User::class);
    }

    public function direcciones()
    {
        return $this->hasMany(Direccion::class);
    }

    public function compras()
    {
        return $this->hasMany(Compra::class);
    }
}
