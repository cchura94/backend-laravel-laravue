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
        $u1 = new User;
        $u1->name = "admin2";
        $u1->email = "admin2@mail.com";
        $u1->password = bcrypt("admin54321");
        $u1->save();

        $u2 = new User;
        $u2->name = "juan";
        $u2->email = "juan@mail.com";
        $u2->password = bcrypt("juan54321");
        $u2->save();

        $u3 = new User;
        $u3->name = "oscar";
        $u3->email = "oscar@mail.com";
        $u3->password = bcrypt("oscar54321");
        $u3->save();

        // asignar role
        $u1->assignRole("administrador");

        $u2->assignRole("docente");

        $u3->assignRole("estudiante");
        
    }
}
