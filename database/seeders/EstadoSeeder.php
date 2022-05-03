<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estado = new Estado();
        $estado -> estado = 'Libre';
        $estado ->save();

        $estado = new Estado();
        $estado -> estado = 'En espera';
        $estado ->save();

        $estado = new Estado();
        $estado -> estado = 'Confirmado';
        $estado ->save();

    }
}
