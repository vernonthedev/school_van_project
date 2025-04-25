<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ParentToStudent>
 */
class ParentToStudentFactory extends Factory
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
            'longitude' => $this->faker->longitude,
            'latitude' => $this->faker->latitude,
            'phoneNumber' => $this->faker->phoneNumber,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'occupation' => $this->faker->jobTitle,
            'address' => $this->faker->address,
        ];
    }
}
