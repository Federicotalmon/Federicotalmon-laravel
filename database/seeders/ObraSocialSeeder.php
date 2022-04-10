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
        $os1->cuit = 202020;
        $os1->nombre = "IOSFA";
        $os1->save();

        $os2 = new Obra_social();
        $os2->cuit = 13202020;
        $os2->nombre = "Avalian";
        $os2->save();

        $os3 = new Obra_social();
        $os3->cuit = 434324;
        $os3->nombre = "OSDE";
        $os3->save();

           }
}
