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

        $date1 = Carbon::parse('12/05/1956')->format('d-m-Y');
        $paciente1->dni=123321;
        $paciente1->email="homerojay@gmail.com";
        $paciente1->fecha_nacimiento = $now;
        $paciente1->sexo = 'H';
        $paciente1->telefono = 9999999; 
        $paciente1->obra_social_cuit = 111111; 
        $paciente1->save();

        $paciente2 = new Paciente();

        $date2 = Carbon::parse('12/06/1962')->format('d-m-Y');
        $paciente2->dni=91827364;
        $paciente2->email="seniorabouvier@gmail.com";
        $paciente2->fecha_nacimiento = $date2;
        $paciente2->sexo = 'M';
        $paciente2->telefono = 555555; 
        $paciente2->obra_social_cuit = 333333; 
        $paciente2->save();


    }
}
