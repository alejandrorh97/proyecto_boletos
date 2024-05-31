<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')->constrained('personas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('pais');
            $table->string('estado');
            $table->string('ciudad');
            $table->string('linea_1');
            $table->string('linea_2')->nullable();
            $table->string('casa');
            $table->string('codigo_postal');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('direcciones');
    }
};
