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
            $table->string("userId");
            $table->string("idPlanta");
            $table->string("longitud");
            $table->string("latitud");
            $table->string("localidad");
            $table->string("ubicacion");
            $table->string("fisiografia");            
            $table->string("fechaColecta");
            $table->string("img");
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
