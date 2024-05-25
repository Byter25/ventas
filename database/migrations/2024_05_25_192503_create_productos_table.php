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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string("descripcion");
            $table->decimal('precio',10,2)->unsigned();
            $table->boolean('estado')->default(1);
            $table->foreignId('id_modelo')->constrained('modelos');
            $table->foreignId('id_color')->constrained('colores'); 
            $table->foreignId('id_medidas')->constrained('medidas');
            $table->foreignId('id_marca')->constrained('marcas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
