<?php

namespace Database\Seeders;

use App\Models\User;
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
        //
      User::create([
            'name'=>'Anonimo',
            'email'=>'Anonimo@anonimo.com',
            'password'=>bcrypt('12345678')
        ]);
        $user = User::create([
            'name'=>'Miguel Albanez',
            'email'=>'miguel_albanez_96@hotmail.com',
            'password'=>bcrypt('12345678')
        ]);
        $user->assignRole('Admin'); 
        User::factory(99)->create();
    }
}
