<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'poster_path'=>fake()->imageUrl(),
            'adult' => fake()->numberBetween(0, 1),
            'release_date'=>fake()->date(),
            'original_title'=>fake()->text(30),
            'original_language'=>fake()->languageCode(),
            'title'=>fake()->text(30),
            'backdrop_path'=>fake()->imageUrl(),
            'popularity'=>fake()->numberBetween(10, 1000),
            'vote_count'=>fake()->numberBetween(0, 100),
            'vote_average'=>fake()->numberBetween(0, 100),
            'video' => fake()->numberBetween(0, 1),
        ];
    }
}
