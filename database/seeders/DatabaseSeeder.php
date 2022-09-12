<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Students;
use App\Models\Lecturers;
use App\Models\Courses;
use App\Models\Enrollment;
use Database\Seeders\CreateUsersSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // create users first before students.
        $this->call(CreateUsersSeeder::class);

        // \App\Models\User::factory(10)->create();
        Students::create([
            'StudentName' => 'Muhammad Acla',
            'StudentSemester' => 3,
            'user_email' => 'acla@gmail.com'
        ]);
        Students::create([
            'StudentName' => 'Myra Tresno Karimah',
            'StudentSemester' => 3,
            'user_email' => 'myra@gmail.com'
        ]);
        Students::create([
            'StudentName' => 'Alca Umaru',
            'StudentSemester' => 1,
            'user_email' => 'alca@gmail.com'
        ]);
        Students::create([
            'StudentName' => 'Yosafat Ardhiansyah',
            'StudentSemester' => 2,
            'user_email' => 'yosafat@gmail.com'
        ]);

        // Lecturers.
        Lecturers::create([
            'LecturerName' => 'Mitsuri Kabuto',
            'LecturerDept' => 'Calculus'
        ]);
        Lecturers::create([
            'LecturerName' => 'Madelaine Pluto',
            'LecturerDept' => 'Programming'
        ]);
        Lecturers::create([
            'LecturerName' => 'Nolahudi salahudin',
            'LecturerDept' => 'Pendidikan Dasar'
        ]);
        Lecturers::create([
            'LecturerName' => 'Qassandra Chaidir',
            'LecturerDept' => 'Cloud'
        ]);

        // Courses.
        Courses::create([
            'CourseName' => 'Calculus I',
            'LecturerID' => 1,
            'CourseSC' => 3
        ]);
        Courses::create([
            'CourseName' => 'Calculus II',
            'LecturerID' => 1,
            'CourseSC' => 3
        ]);
        Courses::create([
            'CourseName' => 'Calculus III',
            'LecturerID' => 1,
            'CourseSC' => 3
        ]);
        Courses::create([
            'CourseName' => 'Logic & Algorithms',
            'LecturerID' => 2,
            'CourseSC' => 2
        ]);
        Courses::create([
            'CourseName' => 'English',
            'LecturerID' => 3,
            'CourseSC' => 2
        ]);
        Courses::create([
            'CourseName' => 'Data Structures I',
            'LecturerID' => 2,
            'CourseSC' => 3
        ]);
        Courses::create([
            'CourseName' => 'Data Structures II',
            'LecturerID' => 2,
            'CourseSC' => 3
        ]);
        Courses::create([
            'CourseName' => 'Data Structures III',
            'LecturerID' => 2,
            'CourseSC' => 3
        ]);
        Courses::create([
            'CourseName' => 'Cloud Computing',
            'LecturerID' => 4,
            'CourseSC' => 3
        ]);

        // Enrollment.
        Enrollment::create([
            'StudentID' => 3,
            'CourseID' => 1,
            'EnrollmentScore' => 80
        ]);
        Enrollment::create([
            'StudentID' => 1,
            'CourseID' => 2
        ]);
        Enrollment::create([
            'StudentID' => 2,
            'CourseID' => 2,
            'EnrollmentScore' => 60
        ]);
    }
}
