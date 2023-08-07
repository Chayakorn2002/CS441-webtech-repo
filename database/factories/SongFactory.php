<?php

namespace Database\Factories;

use App\Models\Artist;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition(): array
    {
        return [
            'title' => fake()->realTextBetween(10, 30, 3),
            // 'artist_id' => Artist::factory(),
            'artist_id' => Artist::inRandomOrder()->first()->id,
            'duration' => fake()->numberBetween(2 * 60, 6 * 60),
        ];
    }
}