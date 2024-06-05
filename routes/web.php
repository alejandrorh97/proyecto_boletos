<?php

use App\Http\Controllers\CodigosQRController;
use App\Http\Controllers\MarcarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::name('qr.')->prefix('qr')->group(function () {
    Route::get('/entrada', [CodigosQRController::class, 'entrada' ])->name('entrada');
    Route::get('/salida', [CodigosQRController::class, 'salida' ])->name('salida');
});