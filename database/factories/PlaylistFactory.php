<?php

namespace Database\Factories;

use App\Models\Playlist;
use App\Models\Song;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Playlist>
 */
class PlaylistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    // public function definition(): array
    // {
    //     return [
    //         'name' => fake()->realTextBetween(10, 30, 3),
    //         'user_id' => User::factory(), 
    //         'accessibility' => fake()->randomElement(['PUBLIC', 'PRIVATE']),
    //     ];
    // }

    public function definition(): array
    {
        return [
            'name' => fake()->sentence(2),
            // 'name' => fake()->sentence(2) . ' Playlist',
            'user_id' => User::inRandomOrder()->first()->id,
            'accessibility' => fake()->randomElement(['PUBLIC', 'PRIVATE']),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(
            function (Playlist $playlist) {
            $playlist->songs()->attach(Song::inRandomOrder()->limit(5)->get(),);
        });
    }
}
