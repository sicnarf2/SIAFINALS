<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offical>
 */
class SongAlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */



    public function definition(): array
    {

        // $pos = [
        //     'Capitan',
        //     'Secretary',
        //     'Treasurer',
        //     'Councilor',
        //     'Sk chairman'
        // ];

        return [
            // 'position' => fake()->randomElement($pos),
            // 'name' => fake()->name(),
            // 'description' => fake()->sentence(),
            // 'email' => fake()->email(),
            // 'phone_number' => fake()->phoneNumber(),
        ];
    }
}
