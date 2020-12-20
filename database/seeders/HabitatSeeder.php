<?php

namespace Database\Seeders;

use App\Models\Habitat;
use Illuminate\Database\Seeder;

class HabitatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Habitat::create([
            'name'=>'Acuáticos'
            
        ]);
        Habitat::create([
            'name'=>'Terrestres'
           
        ]);
        
    }
}
