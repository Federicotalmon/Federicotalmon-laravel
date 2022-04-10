<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos_obras_sociales', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedInteger('matricula');
            $table->unsignedBigInteger('cuit');
            $table->foreign('matricula')->references('matricula')->on('medicos')->onDelete('cascade');
            $table->foreign('cuit')->references('cuit')->on('obras_sociales')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicos_obras_sociales');
    }
};
