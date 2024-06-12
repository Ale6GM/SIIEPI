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
        Schema::create('computadoras', function (Blueprint $table) {
            $table->id();
            $table->string('ip')->unique();
            $table->string('trabajo');
            $table->string('procesador');
            $table->string('velocidad');
            $table->string('almacenamiento');
            $table->string('memoria');
            $table->string('placa');

            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('actividad_id');

            $table->foreign('area_id')->references('id')->on('areas')->onUpdate('cascade');
            $table->foreign('actividad_id')->references('id')->on('actividads')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computadoras');
    }
};
