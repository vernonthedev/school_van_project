<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\Van;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Defining the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'van_id' => Van::factory(),
            'student_id' => Student::factory(),
            'sourceRoute' => $this->faker->address,
            'destinationRoute' => $this->faker->address,
            'startTime' => $this->faker->time(),
            'endTime' => $this->faker->time(),
            'dateOfTrip' => $this->faker->date(),
            'tripStatus' => $this->faker->randomElement(['completed', 'in-progress', 'cancelled']),
        ];
    }
}
