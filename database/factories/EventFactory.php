<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
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
            'user_id' => User::all()->random()->id,
            'title' => $this->faker->word(3),
            'description' => $this->faker->paragraph(2,true),
            'start_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'image' => $this->faker->imageUrl(),
            'price' => rand(0, 5000),
            'occasional' => $this->faker->boolean(80)
        ];
    }
}
