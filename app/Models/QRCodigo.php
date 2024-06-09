<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRCodigo extends Model
{
    use HasFactory;

    protected $table = 'qr_codigos';

    protected $fillable = [
        'codigo',
        'tipo',
        'created_at',
        'updated_at',
    ];

    public function marcaciones()
    {
        return $this->hasMany(Marcacion::class);
    }
}
