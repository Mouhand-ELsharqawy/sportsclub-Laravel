<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Opponent>
 */
class OpponentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(), 
            'phone' => fake()->phoneNumber(), 
            'ContactFirstname' => fake()->name(), 
            'ContactLastname' => fake()->name(), 
            'club' => fake()->word()
        ];
    }
}
