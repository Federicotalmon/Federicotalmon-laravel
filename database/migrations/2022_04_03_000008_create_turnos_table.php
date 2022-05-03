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
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fecha');
            $table->string('detalles');

            $table->unsignedBigInteger('dni_paciente')->nullable(true);
            $table->foreign('dni_paciente')->references('dni')->on('pacientes')->onDelete('set null');
           
            $table->unsignedBigInteger('matricula_medico')->nullable(false);
            $table->foreign('matricula_medico')->references('matricula')->on('medicos')->onDelete('set null');

            $table->unsignedBigInteger('id_estado');
            $table->foreign('id_estado')->references('id')->on('estados')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turnos');
    }
};
