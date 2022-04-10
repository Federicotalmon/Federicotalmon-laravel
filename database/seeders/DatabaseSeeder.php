<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(MedicoSeeder::class);
        $this->call(ObraSocialSeeder::class);
        $this->call(ConsultorioSeeder::class);
        $this->call(PacienteSeeder::class);
    }
}
