<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['andriy', 'sasha', 'pasha', 'kasha', 'masha']),
            'address' => fake()->randomElement(['uzhgorod', 'perechin', 'dubrynichy']),
            'phone_number' => fake()->randomElement(['1111111111', '2222222222', '212121212', '33333333']),
            'curs' => fake()->randomElement(['1', '2', '3', '4'])
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
    }

}
