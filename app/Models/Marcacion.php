<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marcacion extends Model
{
    use HasFactory;

    protected $table = 'marcaciones';

    protected $fillable = [
        'persona_id',
        'codigo_id'
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function codigo()
    {
        return $this->belongsTo(QRCodigo::class);
    }
}
