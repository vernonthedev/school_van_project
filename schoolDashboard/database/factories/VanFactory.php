<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Driver;
use App\Models\Operator;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Van>
 */
class VanFactory extends Factory
{
    /**
     * Defining the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'driver_id' => Driver::factory(),
            'operator_id' => Operator::factory(),
            'name' => 'Van ' . $this->faker->word,
            'numberPlate' => strtoupper($this->faker->bothify('???###')),
            'vanCapacity' => $this->faker->numberBetween(10, 20),
        ];
    }
}
