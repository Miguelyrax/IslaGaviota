<?php

namespace Database\Factories;

use App\Models\Habitat;
use App\Models\Kind;
use App\Models\Specie;
use Illuminate\Database\Eloquent\Factories\Factory;
use illuminate\Support\Str;

class SpecieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Specie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->name;
        return [
            'name' => $name,
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement([Specie::BORRADOR, Specie::REVISION, Specie::PUBLICADO]),
            'slug' => Str::slug($name),
            'user_id' => 1, 
            'kind_id' => Kind::all()->random()->id,
            'habitat_id' => Habitat::all()->random()->id,
            
        ];
    }
}
