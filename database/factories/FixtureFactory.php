<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fixture>
 */
class FixtureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'opponents_id' => fake()->randomDigitNotZero(1,10), 
            'matchDate' => fake()->date(), 
            'homeAwayMatch' => fake()->date(), 
            'resault' => fake()->randomElement(['win','lose','draw']), 
            'score' => fake()->randomFloat(1,50)
        ];
    }
}
