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
        Schema::create('computadora_rotura', function (Blueprint $table) {
            $table->unsignedBigInteger('rotura_id');
            $table->unsignedBigInteger('computadora_id');

            $table->foreign('rotura_id')->references('id')->on('roturas')->onDelete(null)->onUpdate('cascade');
            $table->foreign('computadora_id')->references('id')->on('computadoras')->onDelete(null)->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computadora_rotura');
    }
};
