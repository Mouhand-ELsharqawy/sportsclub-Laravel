<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FixtureStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => fake()->randomElement(['active','disactive']), 
            'fixtures_id' => fake()->randomDigitNotZero(1,10), 
            'members_id' => fake()->randomDigitNotZero(1,10), 
            'sports_id' => fake()->randomDigitNotZero(1,10), 
            'NoOf_fixture' => fake()->randomFloat(), 
            'captain' => fake()->name()
        ];
    }
}
