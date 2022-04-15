<?php

namespace Database\Seeders;

use App\Models\Consultorio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsultorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $consultorio1 = new Consultorio();
        $consultorio1->direccion = 'Calle falsa 123';
        $consultorio1->telefono = 4444444 ;
        $consultorio1->save();

        $consultorio2 = new Consultorio();
        $consultorio2->direccion = 'Avenida Siempre viva 742';
        $consultorio2->telefono = 1234567;
        $consultorio2->save();

    }
}
