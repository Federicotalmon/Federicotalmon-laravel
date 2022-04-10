<?php

namespace Database\Seeders;

use App\Models\Paciente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon :: now();
        $paciente1 = new Paciente();

        
        $paciente1->dni=39157369;
        $paciente1->email="federicotalmon@gmail.com";
        $paciente1->fecha_nacimiento = $now;
        $paciente1->sexo = 'H';
        $paciente1->telefono = 5024107; 
        $paciente1->obra_social_cuit = 202020; 
        $paciente1->save();

        $paciente2 = new Paciente();

        $date2 = Carbon::parse('1995-09-04');
        $paciente2->dni=39157370;
        $paciente2->email="matiastalmon@gmail.com";
        $paciente2->fecha_nacimiento = $date2;
        $paciente2->sexo = 'H';
        $paciente2->telefono = 5024107; 
        $paciente2->obra_social_cuit = 434324; 
        $paciente2->save();


    }
}
