<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Turno;
use Carbon\Carbon;

class TurnosConPacientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $date1 = Carbon::create(2022, 5, 2, 8, 30, 0, 'America/Buenos_Aires');
        $date2 = Carbon::create(2022, 4, 30, 11, 30, 0, 'America/Buenos_Aires');
        $date3 = Carbon::create(2022, 5, 1, 11, 30, 0, 'America/Buenos_Aires');
        $date4 = Carbon::create(2022, 5, 3, 16, 30, 0, 'America/Buenos_Aires');


        $turno = new Turno();
        $turno->dni_paciente = 123321; 
        $turno->id_estado = 2;
        $turno->fecha = $date1;
        $turno->detalles = 'Por ahora no hay detalles';
        $turno->matricula_medico = 100002 ;
        $turno->save();

        $turno = new Turno();
        $turno->dni_paciente = 123321;
        $turno->id_estado = 3;
        $turno->fecha = $date2;
        $turno->detalles = 'Por ahora no hay detalles';
        $turno->matricula_medico = 100006 ;
        $turno->save();

        $turno = new Turno();
        $turno->dni_paciente = 91827364;
        $turno->id_estado = 2;
        $turno->fecha = $date3;
        $turno->detalles = 'Por ahora no hay detalles';
        $turno->matricula_medico = 100000 ;
        $turno->save();

        $turno = new Turno();
        $turno->dni_paciente = 91827364;
        $turno->id_estado = 2;
        $turno->fecha = $date4;
        $turno->detalles = 'Por ahora no hay detalles';
        $turno->matricula_medico = 100003 ;
        $turno->save();

    }
}
