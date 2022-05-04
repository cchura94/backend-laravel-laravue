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

        $u1 = new User;
        $u1->name = "juan";
        $u1->email = "juan@mail.com";
        $u1->password = bcrypt("juan54321");
        $u1->save();
        
    }
}
