<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medidas', function (Blueprint $table) {
            $table->id();
            $table->decimal('alto',5,2)->unsigned();
            $table->decimal('ancho',5,2)->unsigned();
            $table->decimal('fondo',5,2)->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medidas');
    }
};
