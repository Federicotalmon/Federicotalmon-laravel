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
        $consultorio1->direccion = '25 de mayo 1087';
        $consultorio1->telefono = 434508;
        $consultorio1->save();

        $consultorio2 = new Consultorio();
        $consultorio2->direccion = '9 de julio 1040';
        $consultorio2->telefono = 421521;
        $consultorio2->save();

    }
}
