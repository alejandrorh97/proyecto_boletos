<?php

namespace App\Rules\Entrada;

use App\Models\Entrada;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckEntrada implements ValidationRule
{
    private array $errors;

    public function __construct()
    {
        $this->errors = [];
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        foreach ($value as $posicion => $entrada) {
            if (! $this->checkCantidadComprada($entrada['cantidad'])) {
                $this->errors[] = "Entrada {$posicion}: La cantidad debe ser mayor a 0";

                continue;
            }

            $entradaM = $this->checkIfExist($entrada['id']);

            if (! $entradaM) {
                $this->errors[] = "Entrada {$posicion}: La entrada con id {$entrada['id']} no existe";

                continue;
            }

            if (! $this->checkIfAvailable($entradaM)) {
                $this->errors[] = "Entrada {$posicion}: La entrada con id {$entrada['id']} no está disponible";

                continue;
            }

            if (! $this->checkCantidadDisponible($entradaM, $entrada['cantidad'])) {
                $this->errors[] = "Entrada {$posicion}: La cantidad de entradas disponibles es menor a la cantidad comprada";

                continue;
            }
        }

        if (count($this->errors) > 0) {
            $fail($this->message());
        }
    }

    public function message(): string
    {
        return implode("\n", $this->errors);
    }

    private function checkIfExist($id)
    {
        return Entrada::find($id);
    }

    private function checkIfAvailable($entrada): bool
    {
        return $entrada->cantidad > 0;
    }

    private function checkCantidadComprada($cantidad): bool
    {
        return $cantidad > 0;
    }

    private function checkCantidadDisponible($entrada, $cantidaComprada): bool
    {
        return $entrada->cantidad >= $cantidaComprada;
    }
}
