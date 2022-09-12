<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\User;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class StudentCRUDController extends Controller
{
  public function index() {
    $data['students'] = Students::orderBy('id', 'desc')->paginate(5);
    return view('admin.adminHome', $data);
  }

  public function create() {
    return view('admin.create');
  }

  public function store(Request $request) {
    $request->validate([
      'UserName' => 'required',
      'UserEmail' => 'required',
      'StudentName' => 'required',
      'StudentSemester' => 'required',
    ]);

    // create user
    $users = new User;
    $users->name = $request->UserName;
    $users->email = $request->UserEmail;
    $users->is_admin = 0;
    $users->password = bcrypt('123456');
    $users->save();

    
    $student = new Students;
    $student->StudentName = $request->StudentName;
    $student->StudentSemester = $request->StudentSemester;
    $student->user_email = $request->UserEmail;
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
    $request->validate([
      'StudentName' => 'required',
      'StudentSemester' => 'required',
    ]);
    $student = Students::find($id);
    $student->StudentName = $request->StudentName;
    $student->StudentSemester = $request->StudentSemester;
    $student->StudentGPA = $request->StudentGPA;
    $student->save();
    return redirect()->route('home.index')
      ->with('success', 'Student has been updated successfully.');
  }

  public function destroy(Students $home) {
    $home->delete();
    return redirect()->route('home.index')
      ->with('success', 'Students has been deleted successfully');
  }

  public function get_student_data() {
    return Excel::download(new StudentExport, 'gpa-scoring.xlsx');
  }
}
