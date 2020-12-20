<?php

namespace Database\Seeders;

use App\Models\Kind;
use Illuminate\Database\Seeder;

class KindSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kind::create([
            'name'=>'Peces'
            
        ]);
        Kind::create([
            'name'=>'Mamifero'
           
        ]);
        Kind::create([
            'name'=>'Ave'
           
        ]);
        Kind::create([
            'name'=>'Reptiles'
            
        ]);
    }
}
