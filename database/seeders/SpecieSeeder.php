<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Image;
use App\Models\Specie;
use Illuminate\Database\Seeder;

class SpecieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $species = Specie::factory(40)->create(); 
       foreach($species as $specie){
           Image::factory(1)->create([
            'imageable_id' => $specie->id,
            'imageable_type' => 'App\Models\Specie'
           ]);
           Feature::factory(4)->create([
            'specie_id' => $specie->id
        ]);
           
       }
    }
}
