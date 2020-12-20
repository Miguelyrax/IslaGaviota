<?php

namespace Database\Seeders;


use App\Models\Blog;

use App\Models\Image;

use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $blogs = Blog::factory(40)->create(); 
       foreach($blogs as $blog){
           Image::factory(1)->create([
            'imageable_id' => $blog->id,
            'imageable_type' => 'App\Models\Blog'
           ]);
           
       }
    }
}
