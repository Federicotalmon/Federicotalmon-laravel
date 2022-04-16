<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*g*
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            
            $table->unsignedBigInteger('dni')->unique();
            $table->string('email')->unique();
            $table->date('fecha_nacimiento');
            $table->char('sexo',1);
            $table->integer('telefono');
            $table->unsignedBigInteger('obra_social_cuit');
            $table->foreign('obra_social_cuit')->references('cuit')->on('obras_sociales')->onDelete('set null');
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
        Schema::dropIfExists('pacientes');
    }
};
