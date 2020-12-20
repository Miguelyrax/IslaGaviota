<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage; //se usa para generar nuevas carpetas

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('blogs'); //Eliminamos el directorio con todo lo que tiene adentro
        Storage::makeDirectory('blogs'); //Creamos el directorio de nuevo
        
        // \App\Models\User::factory(10)->create();
        $this->call(PermissionsSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(KindSeeder::class);
        $this->call(HabitatSeeder::class);
        $this->call(SpecieSeeder::class);
        

    }
}
