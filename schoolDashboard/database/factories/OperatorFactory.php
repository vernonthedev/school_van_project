<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Operator>
 */
class OperatorFactory extends Factory
{
    /**
     * Defining the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name,
            'phoneNumber' => $this->faker->phoneNumber,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'address' => $this->faker->address,
            'title' => $this->faker->jobTitle,
        ];
    }
}
