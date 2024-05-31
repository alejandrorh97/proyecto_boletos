<?php

namespace App\Models;

use App\Trait\WithPagination;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory, WithPagination;

    protected $fillable = [
        'nombre',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when(isset($filters['nombre']), function ($query) use ($filters) {
            $nombre = $filters['nombre'];
            $query->where('nombre', 'like', '%'.$nombre.'%');
        });
    }
}
