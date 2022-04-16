<?php

namespace Database\Seeders;

use App\Models\Obra_social;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObraSocialSeeder extends Seeder
{
    /**
     * Seed Obra social's table.
     *
     * @return void
     */
    public function run()
    {
        $os1 = new Obra_social();
        $os1->cuit = 111111;
        $os1->nombre = "Obra uno";
        $os1->save();

        $os2 = new Obra_social();
        $os2->cuit = 22222222;
        $os2->nombre = "Obra dos";
        $os2->save();

        $os3 = new Obra_social();
        $os3->cuit = 333333;
        $os3->nombre = "Obra tres";
        $os3->save();

           }
}
