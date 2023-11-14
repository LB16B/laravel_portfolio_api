<?php

namespace Database\Factories;

use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'body' => fake()->sentence(),
            'score' => rand(0, 5),
            'recipe_id' => \App\Models\Recipe::inRandomOrder()->pluck('id')->first(),
            'user_id' => \App\Models\User::inRandomOrder()->pluck('id')->first(),


        ];
    }
}
