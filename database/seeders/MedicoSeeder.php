<?php

namespace Database\Seeders;

use App\Models\medico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicoSeeder extends Seeder
{
    /**
     * Seed Medicos's database.
     *
     * @return void
     */
    public function run()
    {
        $medico1 = new Medico();
        $medico1-> matricula = 123456;
        $medico1-> nombre = 'Nick Riviera';
        $medico1-> especialidad = 'Cirugia';
        $medico1->save();

        $medico2 = new Medico();
        $medico2-> matricula = 111111;
        $medico2-> nombre = 'Julius Hibbert';
        $medico2-> especialidad = 'Medicina General';
        $medico2->save();

        $medico3 = new Medico();
        $medico3-> matricula = 000111;
        $medico3-> nombre = 'Tim whatley';
        $medico3-> especialidad = 'Dentista';
        $medico3->save();
    }
}
