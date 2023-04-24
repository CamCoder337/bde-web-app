<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'name' => $this->faker->word(3),
            'category_id' => Category::all()->random()->id,
            'description' => $this->faker->sentence(2,true),
            'image' => $this->faker->imageUrl(),
            'price' => rand(500, 10000),
            'active' => $this->faker->boolean(80)
        ];
    }
}
