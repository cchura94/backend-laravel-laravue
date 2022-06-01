<?php

namespace Database\Seeders;

use App\Models\Permiso;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r = new Role();
        $r->nombre = "administrador";
        $r->save();

        $r2 = new Role();
        $r2->nombre = "docente";
        $r2->save();

        $r3 = new Role();
        $r3->nombre = "estudiante";
        $r3->save();

        // asignar permisos
        $manage = Permiso::where("nombre", "manage_all")->first();
        $r->allowTo($manage);

        $r2->allowTo("listar_carrera");
        $r2->allowTo("crear_carrera");
        $r2->allowTo("mostrar_carrera");
        $r2->allowTo("editar_carrera");
        $r2->allowTo("eliminar_carrera");

        $r3->allowTo("listar_carrera");
        $r3->allowTo("mostrar_carrera");

    }
}
