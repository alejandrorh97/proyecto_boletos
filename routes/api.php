<?php

use App\Http\Controllers\{AuthController, CarreraController, CircuitoController, CompraController, DireccionController, EntradaController, EquipoController};
use Illuminate\Support\Facades\Route;

Route::name('auth.')->prefix('auth')->group(function () {
    Route::post('registrar', [AuthController::class, 'registrar'])->name('registrar');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::name('equipos.')->prefix('equipos')->group(function () {
        Route::get('/index', [EquipoController::class, 'index'])->name('index');
        Route::post('/store', [EquipoController::class, 'store'])->name('store');
        Route::get('/show/{equipo}', [EquipoController::class, 'show'])->name('show');
        Route::put('/update/{equipo}', [EquipoController::class, 'update'])->name('update');
        Route::delete('/delete/{equipo}', [EquipoController::class, 'destroy'])->name('destroy');
    });

    Route::name('circuitos.')->prefix('circuitos')->group(function () {
        Route::get('/index', [CircuitoController::class, 'index'])->name('index');
        Route::post('/store', [CircuitoController::class, 'store'])->name('store');
        Route::get('/show/{circuito}', [CircuitoController::class, 'show'])->name('show');
        Route::put('/update/{circuito}', [CircuitoController::class, 'update'])->name('update');
        Route::delete('/delete/{circuito}', [CircuitoController::class, 'destroy'])->name('destroy');
    });

    Route::name('carreras.')->prefix('carreras')->group(function () {
        Route::get('/index', [CarreraController::class, 'index'])->name('index');
        Route::post('/store', [CarreraController::class, 'store'])->name('store');
        Route::get('/show/{carrera}', [CarreraController::class, 'show'])->name('show');
        Route::put('/update/{carrera}', [CarreraController::class, 'update'])->name('update');
        Route::delete('/delete/{carrera}', [CarreraController::class, 'destroy'])->name('destroy');
    });

    Route::name('entradas.')->prefix('entradas')->group(function () {
        Route::post('/store/{carrera}', [EntradaController::class, 'store'])->name('store');
        Route::put('/update/{entrada}', [EntradaController::class, 'update'])->name('update');
        Route::delete('/delete/{entrada}', [EntradaController::class, 'destroy'])->name('destroy');
    });

    Route::name('compras.')->prefix('compras')->group(function () {
        Route::post('/comprar', [CompraController::class, 'comprar'])->name('comprar');
    });

    Route::name('perfil.')->prefix('perfil')->group(function () {
        Route::get('/me', [AuthController::class, 'perfil'])->name('index');
        Route::post('/updatePerfil', [AuthController::class, 'updatePerfil'])->name('update');

        Route::name('compras.')->prefix('compras')->group(function () {
            Route::get('/index', [CompraController::class, 'index'])->name('index');
        });

        Route::name('direcciones.')->prefix('direcciones')->group(function () {
            Route::get('/show', [DireccionController::class, 'show'])->name('show');
            Route::post('/store', [DireccionController::class, 'store'])->name('store');
        });
    });
});