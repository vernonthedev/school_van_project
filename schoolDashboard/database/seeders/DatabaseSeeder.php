<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ParentToStudent;
use App\Models\Driver;
use App\Models\Van;
use App\Models\Trip;
use App\Models\Student;
use App\Models\Operator;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
            // Create 10 parents with their students
            ParentToStudent::factory()
            ->count(10)
            ->has(Student::factory()->count(2)) // Each parent has 2 students
            ->create();

        // Create 5 drivers
        Driver::factory()
            ->count(5)
            ->create();

        // Create 5 operators
        Operator::factory()
            ->count(5)
            ->create();

        // Create 5 vans with their drivers and operators
        Van::factory()
            ->count(5)
            ->create();

        // Create 20 trips
        Trip::factory()
            ->count(20)
            ->create();
    }
}
