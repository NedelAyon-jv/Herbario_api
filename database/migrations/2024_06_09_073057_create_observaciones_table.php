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
        Schema::create('observaciones', function (Blueprint $table) {
            $table->string("nombre");
            $table->string("identificador");
            $table->string("colector");
            $table->string("idPlanta");
            $table->double("longitud");
            $table->double("latitud");
            $table->string("localidad");
            $table->string("ubicacion");
            $table->string("fisiografia");            
            $table->string("fechaColecta");
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('observaciones');
    }
};
