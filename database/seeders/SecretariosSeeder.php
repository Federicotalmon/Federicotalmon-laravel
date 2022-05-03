<?php

namespace Database\Seeders;

use App\Models\Secretario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SecretariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $secretario = new Secretario();
        $secretario->nombre_usuario = 'Secretario1';
        $secretario->medico_matricula = '100000';
        $secretario->save();

        $secretario = new Secretario();
        $secretario->nombre_usuario = 'Secretario2';
        $secretario->medico_matricula = '100001';
        $secretario->save();
        
        $secretario = new Secretario();
        $secretario->nombre_usuario = 'Secretario3';
        $secretario->medico_matricula = '100002';
        $secretario->save();

        $secretario = new Secretario();
        $secretario->nombre_usuario = 'Secretario4';
        $secretario->medico_matricula = '100003';
        $secretario->save();

        $secretario = new Secretario();
        $secretario->nombre_usuario = 'Secretario5';
        $secretario->medico_matricula = '100004';
        $secretario->save();

        $secretario = new Secretario();
        $secretario->nombre_usuario = 'Secretario6';
        $secretario->medico_matricula = '100005';
        $secretario->save();

        $secretario = new Secretario();
        $secretario->nombre_usuario = 'Secretario7';
        $secretario->medico_matricula = '100006';
        $secretario->save();

        $secretario = new Secretario();
        $secretario->nombre_usuario = 'Secretario8';
        $secretario->medico_matricula = '100007';
        $secretario->save();

        $secretario = new Secretario();
        $secretario->nombre_usuario = 'Secretario9';
        $secretario->medico_matricula = '100008';
        $secretario->save();

        $secretario = new Secretario();
        $secretario->nombre_usuario = 'Secretario10';
        $secretario->medico_matricula = '100009';
        $secretario->save();

        $secretario = new Secretario();
        $secretario->nombre_usuario = 'Secretario11';
        $secretario->medico_matricula = '100010';
        $secretario->save();

        $secretario = new Secretario();
        $secretario->nombre_usuario = 'Secretario12';
        $secretario->medico_matricula = '100011';
        $secretario->save();
    }
}
