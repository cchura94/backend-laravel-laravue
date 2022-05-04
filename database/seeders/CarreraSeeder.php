<?php

namespace Database\Seeders;

use App\Models\Carrera;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c1 = new Carrera;
        $c1->nombre = "INFORMATICA";
        $c1->save();

        $c1 = new Carrera;
        $c1->nombre = "MATEMATICA";
        $c1->save();

        $c1 = new Carrera;
        $c1->nombre = "FISICA";
        $c1->save();        
    }
}
