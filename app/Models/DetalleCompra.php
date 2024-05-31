<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;

    protected $table = 'detalles_compras';

    protected $fillable = [
        'compra_id',
        'entrada_id',
        'cantidad',
        'subtotal',
        'observaciones',
        'precio_compra',
    ];

    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }

    public function entrada()
    {
        return $this->belongsTo(Entrada::class);
    }
}
