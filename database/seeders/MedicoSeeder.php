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
        $medico1-> matricula = 100000;
        $medico1-> nombre = 'Nick Riviera';
        $medico1-> especialidad = 'Cirugia';
        $medico1->save();

        $medico2 = new Medico();
        $medico2-> matricula = 100001;
        $medico2-> nombre = 'Julius Hibbert';
        $medico2-> especialidad = 'Medicina General';
        $medico2->save();

        $medico3 = new Medico();
        $medico3-> matricula = 100002;
        $medico3-> nombre = 'Tim whatley';
        $medico3-> especialidad = 'Dentista';
        $medico3->save();

        $medico4 = new Medico();
        $medico4-> matricula = 100003;
        $medico4-> nombre = 'Eddie Hazel';
        $medico4-> especialidad = 'Dentista';
        $medico4->save();

        $medico5 = new Medico();
        $medico5-> matricula = 100004;
        $medico5-> nombre = 'Earvin Johnson';
        $medico5-> especialidad = 'Medicina General';
        $medico5->save();

        $medico6 = new Medico();
        $medico6-> matricula = 100005;
        $medico6-> nombre = 'Tim Duncan';
        $medico6-> especialidad = 'Cirugia';
        $medico6->save();

        $medico7 = new Medico();
        $medico7-> matricula = 100006;
        $medico7-> nombre = 'Dennis Rodman';
        $medico7-> especialidad = 'Oftalmologia';
        $medico7->save();

        $medico8 = new Medico();
        $medico8-> matricula = 100007;
        $medico8-> nombre = 'Julius Earving';
        $medico8-> especialidad = 'Dentista';
        $medico8->save();

        $medico9 = new Medico();
        $medico9-> matricula = 100008;
        $medico9-> nombre = 'Larry Bird';
        $medico9-> especialidad = 'Oftalmologia';
        $medico9->save();

        $medico10 = new Medico();
        $medico10-> matricula = 100009;
        $medico10-> nombre = 'Juan Perez';
        $medico10-> especialidad = 'Oftalmologia';
        $medico10->save();

        $medico11 = new Medico();
        $medico11-> matricula = 100010;
        $medico11-> nombre = 'Pedro Gonzalez';
        $medico11-> especialidad = 'Medicina General';
        $medico11->save();

        $medico12 = new Medico();
        $medico12-> matricula = 100011;
        $medico12-> nombre = 'Juan Gomez';
        $medico12-> especialidad = 'Dentista';
        $medico12->save();
    }
}
 