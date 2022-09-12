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
          'Courses.CourseName',
          'Students.StudentName',
          'Students.user_email',
          'Lecturers.LecturerName',
          'Lecturers.LecturerDept',
          'Courses.CourseSC'
        )->get(); 

      $courses = Courses::join('Lecturers', 'Courses.LecturerID', '=', 'Lecturers.id')
        ->select(
          'Courses.id', 
          'Courses.CourseName', 
          'Lecturers.LecturerName', 
          'Courses.CourseSC'
        )->get();

      $data['coba'] = $users;
      $data['enrollments'] = $enrollments; 
      $data['courses'] = $courses;

      $data['students'] = Students::orderBy('id', 'desc')->paginate(5);
      return view('student.index', $data);
    }

  public function store(Request $request) {
    // implemement logic validate adding extra course for a student

    $enrollment = new Enrollment;
    $enrollment->StudentID = $request->StudentID;

    $enrollment->CourseID = $request->CourseID;
    $enrollment->save();
    return redirect()->route('course.index');
  }

  public function storeDefault(Request $request) {
    $request->validate([
      'StudentName' => 'required',
      'StudentSemester' => 'required',
    ]);
    $student = new Students;
    $student->StudentName = $request->StudentName;
    $student->StudentSemester = $request->StudentSemester;
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
