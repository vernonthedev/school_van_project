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
use App\Models\VanStudent;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Creating 10 parents with their students and each has two students
        ParentToStudent::factory()->count(10)->has(Student::factory()->count(2))->create();

        // Creating 5 drivers
        Driver::factory()->count(5)->create();

        // Creating 5 operators
        Operator::factory()->count(5)->create();

       // Creating vans and students first
        $vans = Van::factory()->count(5)->create();
        $students = Student::factory()->count(20)->create();

        // Attaching students to vans (many-to-many)
        $vans->each(function ($van) use ($students) {
            $van->students()->attach(
                $students->random(rand(5, 10))->pluck('id')
            );
        });

        // Creating trips for each van-student combination
        VanStudent::all()->each(function ($vanStudent) {
            Trip::factory()->count(rand(1, 3))->create([
                'van_student_id' => $vanStudent->id,
                'van_id' => $vanStudent->van_id
            ]);
        });
    }
}
