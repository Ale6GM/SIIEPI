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
        Schema::create('computadora_sistema', function (Blueprint $table) {
            $table->unsignedBigInteger('computadora_id');
            $table->unsignedBigInteger('sistema_id');

            $table->foreign('computadora_id')->references('id')->on('computadoras')->onDelete(null)->onUpdate('cascade');
            $table->foreign('sistema_id')->references('id')->on('sistemas')->onDelete(null)->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computadora_sistema');
    }
};
