<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')->constrained('personas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('carrera_id')->constrained('carreras')->onDelete('cascade')->onUpdate('cascade');
            $table->float('total', 8, 2);
            $table->timestamp('fecha_compra')->useCurrent();
            $table->enum('metodo_pago', ['tarjeta', 'efectivo', 'paypal', 'transferencia', 'otro']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
