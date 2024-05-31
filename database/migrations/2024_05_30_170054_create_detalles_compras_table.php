<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalles_compras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('compra_id')->constrained('compras')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('entrada_id')->constrained('entradas')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('cantidad');
            $table->decimal('precio_compra', 8, 2);
            $table->decimal('subtotal', 8, 2);
            $table->string('observaciones')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalles_compras');
    }
};
