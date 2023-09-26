<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'membership_types_id' => fake()->randomDigitNotZero(1,10), 
            'FirtName' => fake()->name(), 
            'LastName' => fake()->name(),  
            'address' => fake()->streetAddress(), 
            'PostCode' => fake()->randomFloat(), 
            'HomePhone' => fake()->phoneNumber(), 
            'MobilePhone' => fake()->phoneNumber(), 
            'DOB' => fake()->date(), 
            'method' => fake()->sentence(5), 
            'SubsAmount' => fake()->randomFloat()
        ];
    }
}
