<?php

namespace App\Http\Controllers;

use App\Models\QRCodigo;

class CodigosQRController extends Controller
{
    public function entrada()
    {
        $codigo = QRCodigo::query()
            ->select()
            ->whereDate('created_at', now())
            ->where('tipo', 'entrada')
            ->first();

        return view('qr.entrada', compact('codigo'));
    }

    public function salida()
    {
        $codigo = QRCodigo::query()
            ->select()
            ->whereDate('created_at', now())
            ->where('tipo', 'salida')
            ->first();

        return view('qr.entrada', compact('codigo'));
    }
}
