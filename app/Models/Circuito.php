<?php

namespace App\Models;

use App\Trait\WithPagination;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circuito extends Model
{
    use HasFactory, WithPagination;

    protected $fillable = [
        'nombre',
        'descripcion',
        'longitud',
        'tipo',
    ];

    public function carreras()
    {
        return $this->hasMany(Carrera::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when(isset($filters['nombre']), fn ($query) => $query->where('nombre', 'like', "%{$filters['nombre']}%"))
            ->when(isset($filters['tipo']), fn ($query) => $query->where('tipo', 'like', "%{$filters['tipo']}%"));
    }
}
