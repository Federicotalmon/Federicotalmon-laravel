<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        $admin1 = new User();
        $admin1->name = 'Administrador';
        $admin1->email = 'federicotalmon@gmail.com';
        $admin1->password = '12345678';
        $admin1->save();
    }
}
