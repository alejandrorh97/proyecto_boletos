<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->id();
            $table->string('departamento');
            $table->string('municipio');
            $table->string('residencia');
            $table->string('calle');
            $table->string('poligono');
            $table->string('numero');
            $table->foreignId('propietario_id')->constrained('propietarios');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inmuebles');
    }
};
