<?php

namespace Database\Seeders;

use App\Models\Permiso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new Permiso();
        $p->nombre = "manage_all";
        $p->save();

        $p = new Permiso();
        $p->nombre = "listar_carrera";
        $p->save();

        $p = new Permiso();
        $p->nombre = "crear_carrera";
        $p->save();

        $p = new Permiso();
        $p->nombre = "mostrar_carrera";
        $p->save();

        $p = new Permiso();
        $p->nombre = "editar_carrera";
        $p->save();

        $p = new Permiso();
        $p->nombre = "eliminar_carrera";
        $p->save();
    }
}
