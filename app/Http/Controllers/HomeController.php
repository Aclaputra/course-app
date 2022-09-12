<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Students;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = Students::join(
          'users',
          'Students.user_email', '=', 'users.email'
        )->where('Students.user_email', '=', Auth::user()->email)
          ->select('Students.id', 'users.email', 'Students.StudentName')
          ->get()->first(); 

       $enrollments =  Enrollment::join('Students', 
          'Enrollment.StudentID', '=', 'Students.id')
        ->join(
          'Courses',
          'Enrollment.CourseID', '=', 'Courses.id')
        ->join(
          'Lecturers', 
          'Courses.LecturerID', '=', 'Lecturers.id'
        )->where('Students.user_email', '=', $users->email)
        ->select(
          'Enrollment.id',
          'Enrollment.EnrollmentScore',
          'Courses.CourseName',
          'Students.StudentName',
          'Students.StudentSemester',
          'Students.user_email',
          'Students.StudentGPA',
          'Lecturers.LecturerName',
          'Lecturers.LecturerDept',
          'Courses.CourseSC'
        )->get(); 

        $data['enrollments'] = $enrollments;

        if(Auth::user()->is_admin == 0) {
          return view('home', $data);
        } else if(Auth::user()->is_admin == 1) {
          return view('home');
        }
    }

    public function adminExport() {
      return view('admin.export');
    }

    public function adminHome() {
      return view('adminHome');
    }
}
