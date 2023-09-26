<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
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
            'sports_id' => fake()->randomDigitNotZero(1,10), 
            'leagues_id' => fake()->randomDigitNotZero(1,10), 
            'fixtures_id' => fake()->randomDigitNotZero(1,10), 
            'league_division' => fake()->sentence(3), 
            'captin_name' => fake()->name(), 
            'GoalKeeper' => fake()->name(), 
            'AltGoalkeeper' => fake()->sentence(2), 
            'CenterBack' => fake()->name(), 
            'AltCenterBack' => fake()->sentence(2), 
            'RightBack' => fake()->name(), 
            'AltRightBack' => fake()->sentence(2), 
            'LeftBack' => fake()->name(), 
            'AltLeftBack' => fake()->sentence(2), 
            'RightWingBack' => fake()->name(), 
            'AltRightWingBack' => fake()->sentence(), 
            'LeftWingBack' => fake()->name(), 
            'AltLeftWingBack' => fake()->sentence(2), 
            'CenterDefensiveMidfeilder' => fake()->name(), 
            'AltCenterDefensiveMidfeilder' => fake()->sentence(2), 
            'CenterMidfeilder' => fake()->name(), 
            'AltCenterMidfeilder' => fake()->sentence(2), 
            'RightMidfeilder' => fake()->name(), 
            'AltRightMidfeilder' => fake()->sentence(2), 
            'LeftMidfeilder' => fake()->name(), 
            'AltLeftMidfeilder' => fake()->name(), 
            'CentralAttackingMidfeilder' => fake()->name(), 
            'AltCentralAttackingMidfeilder' => fake()->name(), 
            'Striker' => fake()->name(), 
            'AltStriker' => fake()->name(), 
            'CenterForword' => fake()->name(), 
            'AltCenterForword' => fake()->name(), 
            'RightWing' => fake()->name(), 
            'AltRightWing' => fake()->name(), 
            'LeftWing' => fake()->name(), 
            'AltLeftWing' => fake()->name(), 
            'RightForward' => fake()->name(), 
            'AltRightForward' => fake()->name(), 
            'LeftForward' => fake()->name(), 
            'AltLeftForward' => fake()->name()
        ];
    }
}
