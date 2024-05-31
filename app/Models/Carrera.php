<?php

namespace App\Models;

use App\Trait\WithPagination;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory, WithPagination;

    protected $fillable = [
        'circuito_id',
        'nombre',
        'descripcion',
        'fecha',
        'lugar',
    ];

    public function circuito()
    {
        return $this->belongsTo(Circuito::class);
    }

    public function entradas()
    {
        return $this->hasMany(Entrada::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when(isset($filters['busqueda']), function ($query) use ($filters) {
            $query->where('nombre', 'like', '%'.$filters['busqueda'].'%')
                ->orWhere('descripcion', 'like', '%'.$filters['busqueda'].'%')
                ->orWhere('lugar', 'like', '%'.$filters['busqueda'].'%');
        })
        ->when(isset($filters['fecha_inicio']) && isset($filters['fecha_fin']), function ($query) use ($filters) {
            $fechaInicio = Carbon::createFromFormat('d-m-Y', $filters['fecha_inicio'])->startOfDay();
            $fechaFin    = Carbon::createFromFormat('d-m-Y', $filters['fecha_fin'])->endOfDay();
            $query->whereDate('fecha', '>=', $fechaInicio)
                ->whereDate('fecha', '<=', $fechaFin);
        });
    }
}
