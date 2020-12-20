<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Blog;


use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use illuminate\Support\Str;
class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //hola mundo
        //hola-mundo

        $title = $this->faker->sentence();
        return [
            'title' => $title,
            'subtitle' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement([Blog::BORRADOR, Blog::REVISION, Blog::PUBLICADO]),
            'slug' => Str::slug($title),
            'user_id' => 1, 
            'category_id' => Category::all()->random()->id,
            
        ];
    }
}
