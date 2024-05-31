<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('circuito_id')->constrained('circuitos')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->dateTime('fecha');
            $table->string('lugar');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carreras');
    }
};
