<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Van;
use App\Models\VanStudent;
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
            'van_student_id' => VanStudent::factory(),
            'van_id' => function (array $attributes) {
                return VanStudent::find($attributes['van_student_id'])->van_id;
            },
            'sourceRoute' => $this->faker->address,
            'destinationRoute' => $this->faker->address,
            'startTime' => $this->faker->time(),
            'endTime' => $this->faker->time(),
            'dateOfTrip' => $this->faker->date(),
            'tripStatus' => $this->faker->randomElement(['completed', 'in-progress', 'cancelled']),
        ];
    }
}
