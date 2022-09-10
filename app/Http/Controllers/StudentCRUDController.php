<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;

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

    // create user

    $request->validate([
      'StudentName' => 'required',
      'StudentYear' => 'required',
      'user_email' => 'required'
    ]);
    $student = new Students;
    $student->StudentName = $request->StudentName;
    $student->StudentYear = $request->StudentYear;
    $student->user_email = $request->user_email;
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
      'StudentYear' => 'required',
    ]);
    $student = Students::find($id);
    $student->StudentName = $request->StudentName;
    $student->StudentYear = $request->StudentYear;
    $student->save();
    return redirect()->route('home.index')
      ->with('success', 'Student has been updated successfully.');
  }

  public function destroy(Students $home) {
    $home->delete();
    return redirect()->route('home.index')
      ->with('success', 'Students has been deleted successfully');
  }
}
