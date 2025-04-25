<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Van;
use App\Models\Student;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VanStudent>
 */
class VanStudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'van_id' => Van::factory(),
            'student_id' => Student::factory(),
        ];
    }
}
