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
            $table->string('estado');
            $table->date('fecha');
            $table->date('hora');
            $table->string('detalles');

            $table->unsignedBigInteger('dni_paciente');
            $table->foreign('dni_paciente')->references('dni')->on('pacientes')->onDelete('set null');
           
            $table->unsignedBigInteger('matricula_medico');
            $table->foreign('matricula_medico')->references('matricula')->on('medicos')->onDelete('set null');


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
