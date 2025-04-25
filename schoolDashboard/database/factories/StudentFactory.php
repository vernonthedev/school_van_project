<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ParentToStudent;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Defining the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'parent_to_student_id' => ParentToStudent::factory(),
            'name' => $this->faker->name,
            'class' => 'Class ' . $this->faker->randomElement(['lion','tiger','zebra','kangaroo']),
            'gender' => $this->faker->randomElement(['male', 'female']),
        ];
    }
}
