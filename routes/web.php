<?php

use App\Http\Controllers\CodigosQRController;
use Illuminate\Support\Facades\Route;

Route::name('qr.')->prefix('qr')->group(function () {
    Route::get('/entrada', [CodigosQRController::class, 'entrada' ])->name('entrada');
    Route::get('/salida', [CodigosQRController::class, 'salida' ])->name('salida');
});