<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'Crear blogs',
            
        ]);
        Permission::create([
            'name' => 'Leer blogs',
            
        ]);
        Permission::create([
            'name' => 'Actualizar blogs',
            
        ]);
        Permission::create([
            'name' => 'Eliminar blogs',
            
        ]);
        Permission::create([
            'name' => 'Crear species',
            
        ]);
        Permission::create([
            'name' => 'Leer species',
            
        ]);
        Permission::create([
            'name' => 'Actualizar species',
            
        ]);
        Permission::create([
            'name' => 'Eliminar species',
            
        ]);

        Permission::create([
            'name' => 'Ver dashboard',
            
        ]);
        Permission::create([
            'name' => 'Crear rol',
            
        ]);
        Permission::create([
            'name' => 'Listar rol',
            
        ]);
        Permission::create([
            'name' => 'Editar rol',
            
        ]);
        Permission::create([
            'name' => 'Eliminar rol',
            
        ]);
        Permission::create([
            'name' => 'Leer usuarios',
            
        ]);
        Permission::create([
            'name' => 'Editar usuarios',
            
        ]);
        
    }
}
