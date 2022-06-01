<?php

namespace Database\Seeders;

use App\Models\Permiso;
use App\Models\Role;
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
        //\App\Models\User::factory(100)->create();
        
        $this->call([
            CarreraSeeder::class,
            AulaSeeder::class,
            PermisoSeeder::class,
            RoleSeeder::class,
            UserSeeder::class
        ]);
        
    }
}
