<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Students;
use App\Models\Lecturers;
use App\Models\Courses;
use App\Models\Enrollment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Students::create([
            'StudentName' => 'Muhammad Acla',
            'StudentYear' => 3
        ]);
        Students::create([
            'StudentName' => 'Myra Tresno Karimah',
            'StudentYear' => 3
        ]);
        Students::create([
            'StudentName' => 'Alca Umaru',
            'StudentYear' => 1
        ]);

        // Lecturers.
        Lecturers::create([
            'LecturerName' => 'Mitsuri Kabuto',
            'LecturerDept' => 'Calculus'
        ]);

        // Courses.
        Courses::create([
            'CourseName' => 'Calculus I',
            'LecturerID' => 1
        ]);
        Courses::create([
            'CourseName' => 'Calculus III',
            'LecturerID' => 1
        ]);

        // Enrollment.
        Enrollment::create([
            'StudentID' => 3,
            'CourseID' => 1
        ]);
        Enrollment::create([
            'StudentID' => 1,
            'CourseID' => 2
        ]);
        Enrollment::create([
            'StudentID' => 2,
            'CourseID' => 2
        ]);
    }
}
