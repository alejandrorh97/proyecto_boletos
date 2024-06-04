<?php

namespace App\Http\Controllers;

use App\Http\Requests\Compra\CompraStoreRequest;
use App\Http\Resources\Compra\CompraIndexResource;
use App\Models\Compra;
use App\Models\Entrada;
use Exception;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    public function index()
    {
        $usuario = auth()->user();
        $compras = $usuario->persona->load([
            'compras',
            'compras.detallesCompra',
            'compras.carrera',
            'compras.detallesCompra.entrada',
        ])->compras;

        return CompraIndexResource::collection($compras);
    }

    public function comprar(CompraStoreRequest $request)
    {
        DB::transaction(function () use ($request) {
            $usuario = auth()->user();
            $compra  = Compra::create([
                'metodo_pago' => $request->metodo_pago,
                'persona_id'  => $usuario->persona->id,
                'carrera_id'  => $request->carrera_id,
                'metodo_pago' => $request->metodo_pago,
                'total'       => 0,
            ]);

            $entradas      = $this->getEntradas($request->entradas);
            $detalles      = $this->getDetalles($entradas, $compra);
            $compra->detallesCompra()->createMany($detalles);
            $compra->total = $detalles->sum('subtotal');
            $compra->save();
        });

        return response()->json(['message' => 'Compra realizada con éxito'], 201);
    }

    private function getEntradas($entradas)
    {
        return Entrada::whereIn('id', array_column($entradas, 'id'))
            ->get()
            ->map(function ($entrada) use ($entradas) {
                $cantidadComprada = $entradas[array_search($entrada->id, array_column($entradas, 'id'))]['cantidad'];
                if ($entrada->cantidad < $cantidadComprada) {
                    throw new Exception("No hay suficientes entradas para la compra");
                }
                $entrada->cantidad -= $cantidadComprada;
                $entrada->save();
                $entrada->cantidadComprada = $cantidadComprada;
                return $entrada;
            });
    }

    private function getDetalles($entradas, $compra)
    {
        return $entradas->map(function ($entrada) use ($compra) {
            return [
                'compra_id'     => $compra->id,
                'entrada_id'    => $entrada->id,
                'cantidad'      => $entrada->cantidadComprada,
                'precio_compra' => $entrada->precio,
                'subtotal'      => $entrada->precio * $entrada->cantidadComprada,
            ];
        });
    }
}
