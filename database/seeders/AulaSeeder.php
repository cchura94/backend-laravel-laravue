<?php

namespace Database\Seeders;

use App\Models\Aula;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $aula = new Aula();
        $aula->nombre = "AULA 1";
        $aula->ubicacion = "1 piso";
        $aula->capacidad = 30;
        $aula->save();

        $aula = new Aula();
        $aula->nombre = "AULA 2";
        $aula->ubicacion = "2 piso";
        $aula->capacidad = 45;
        $aula->save();

        $aula = new Aula();
        $aula->nombre = "AULA 3";
        $aula->ubicacion = "planta Baja";
        $aula->capacidad = 50;
        $aula->save();      

        
    }
}
