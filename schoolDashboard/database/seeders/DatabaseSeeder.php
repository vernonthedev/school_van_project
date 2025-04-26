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
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Creating parents with students
        ParentToStudent::factory()->count(10)->has(Student::factory()->count(2))->create(['role' => User::ROLE_PARENT]);

        // Creating drivers and operators
        Driver::factory()->count(5)->create(['role' => User::ROLE_DRIVER]);
        Operator::factory()->count(5)->create(['role' => User::ROLE_OPERATOR]);

        // Creating vans
        $vans = Van::factory()->count(5)->create();
        $students = Student::all();

        // Creating van-student relationships
        $vans->each(function ($van) use ($students) {
            $van->students()->attach(
                $students->random(rand(5, 10))->pluck('id')
            );
        });

        // Creating trips using the existing van-student relationships
        DB::table('van_student')->get()->each(function ($vanStudent) {
            Trip::factory()
                ->count(rand(1, 3))
                ->create([
                    'van_student_id' => $vanStudent->id,
                    'van_id' => $vanStudent->van_id
                ]);
        });
    }
}
