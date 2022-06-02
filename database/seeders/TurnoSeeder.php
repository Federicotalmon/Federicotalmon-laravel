<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Turno;
use Carbon\Carbon;

class TurnoSeeder extends Seeder
{  
    
    public function run()
    {
        $matriculas = array(100000,100001,100002,100003,
        100004,100005,100006,100007,100008,100009,100010,100011); 

        $date1 = Carbon::create(2022, 4, 26, 8, 0, 0, 'America/Buenos_Aires');
        $date2 = Carbon::create(2022, 4, 26, 10, 0, 0, 'America/Buenos_Aires');
        $date3 = Carbon::create(2022, 4, 26, 12, 0, 0, 'America/Buenos_Aires');
        $date4 = Carbon::create(2022, 4, 26, 16, 0, 0, 'America/Buenos_Aires');

        

        
        for($d = 0;$d < 10 ;$d++){
            for($i = 0;$i < count($matriculas);$i++) {
                $turno1 = new Turno();
                $turno1->id_estado = 1;
                $turno1->fecha = $date1;
                $turno1->detalles = 'Por ahora no hay detalles';
                $turno1->matricula_medico = $matriculas[$i] ;
                $turno1->save();

                $turno2 = new Turno();
                $turno2->id_estado = 1;
                $turno2->fecha = $date2;
                $turno2->detalles = 'Por ahora no hay detalles';
                $turno2->matricula_medico = $matriculas[$i] ;
                $turno2->save();

                $turno3 = new Turno();
                $turno3->id_estado = 1;
                $turno3->fecha = $date3;
                $turno3->detalles = 'Por ahora no hay detalles';
                $turno3->matricula_medico = $matriculas[$i] ;
                $turno3->save();

                $turno4 = new Turno();
                $turno4->id_estado = 1;
                $turno4->fecha = $date4;
                $turno4->detalles = 'Por ahora no hay detalles';
                $turno4->matricula_medico = $matriculas[$i] ;
                $turno4->save();
            }
            $date1 = $date1->add('1 day');
            $date2 = $date2->add('1 day');
            $date3 = $date3->add('1 day');
            $date4 = $date4->add('1 day');
        }
        
    }
}
