<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('qr_codigos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->enum('tipo', ['entrada', 'salida'])->default('entrada');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('qr_codigos');
    }
};
