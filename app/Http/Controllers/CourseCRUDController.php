<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Courses;
use App\Models\Students;
use Illuminate\Support\Facades\Auth;

class CourseCRUDController extends Controller
{
  public function index() {
    $user = Students::join('users', 'Students.user_email', '=', 'users.email')
              ->where('Students.user_email', '=', Auth::user()->email)
              ->select('Students.id', 'users.email', 'Students.StudentName')
              ->get()->first();
    $data['coba'] = $user;
    $data['enrollments'] = Enrollment::join('Students', 'Enrollment.StudentID', '=', 'Students.id')
                              ->join('Courses', 'Enrollment.CourseID', '=', 'Courses.id')
                              ->join('Lecturers', 'Courses.LecturerID', '=', 'Lecturers.id')
                              ->where('Students.user_email', '=', $user->email)
                              ->select('Enrollment.id', 'Courses.CourseName', 'Students.StudentName', 'Students.user_email', 'Lecturers.LecturerName', 'Lecturers.LecturerDept', 'Courses.sks')
                              ->get();
    $data['courses'] = Courses::join('Lecturers', 'Courses.LecturerID', '=', 'Lecturers.id')
                          ->select('Courses.id', 'Courses.CourseName', 'Lecturers.LecturerName', 'Courses.sks')
                          ->get();  
    $data['students'] = Students::orderBy('id', 'desc')->paginate(5);
    return view('student.index', $data);
  }

  public function store(Request $request) {
    $request->validate([
      'CourseID' => 'unique'
    ]);

    $enrollment = new Enrollment;
    $enrollment->StudentID = $request->StudentID;
    $enrollment->CourseID = $request->CourseID;
    $enrollment->save();
    return redirect()->route('course.index');
  }

  public function storeDefault(Request $request) {
    $request->validate([
      'StudentName' => 'required',
      'StudentYear' => 'required',
    ]);
    $student = new Students;
    $student->StudentName = $request->StudentName;
    $student->StudentYear = $request->StudentYear;
    $student->save();
    return redirect()->route('home.index')
      ->with('success', 'Student has been created successfully.');
  }

  public function show(Students $home) {
    return view('admin.show', compact('home'));
  }

  public function edit(Students $home) {
    return view('admin.edit', compact('home'));
  }

  public function update(Request $request, $id) {
    
  }

  public function destroy(Enrollment $course) {

    $course->delete();
    return redirect()->route('course.index')
      ->with('success', 'Enrollment has been deleted successfully');
  }
}
