<?php

namespace Database\Factories;

use App\Models\Movie;
use App\Models\Movies;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GenreId>
 */
class GenreIdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ref' => fake()->numberBetween(1, 80),
            'movie_id' => Movie::all()->random()->id,
        ];
    }
}
