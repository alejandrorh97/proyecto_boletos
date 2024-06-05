<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('marcaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('persona_id')->constrained('personas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('codigo_id')->constrained('qr_codigos')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('marcaciones');
    }
};
