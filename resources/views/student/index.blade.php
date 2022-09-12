@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-16">
      <div class="card">
        <div class="card-header">Semester Credit Dashboard</div>
        <div class="card-body">
          Hi, {{$coba->StudentName}}. Let's manage your Semester Credits. 
         <!-- template -->
           <div class="container mt-2">
             <div class="row">
              <div class="col-lg-12 margin-tb">
               <div class="pull-left">
                <h2></h2>
               </div>
             </div>
           </div>
          @if ($message = Session::get('success'))
           <div class="alert alert-success">
             <p>{{ $message }}</p>
           </div>
          @endif
          <div class="d-flex justify-content-between">
          <div>
           <table class="table table-bordered">
            <tr>
             <th colspan="6">Enrollment</th>
            <tr>
            <tr>
             <th>No</th>
             <th>Course Taken</th>
             <th>Professor</th>
             <th>Department</th>
             <th>SC</th>
             <th>Action</th>
            </tr>
            <?php 
              $totalsks = 0; 
              $ycid = 1;
            ?>
            @foreach ($enrollments as $enrollment)
            <tr>
              <td>{{ $ycid }}</td>
              <td>{{ $enrollment->CourseName }}</td>
              <td>{{ $enrollment->LecturerName }}</td>
              <td>{{ $enrollment->LecturerDept }}</td>
              <td>{{ $enrollment->CourseSC }}</td>
              <td>
               <form action="{{ route('course.destroy',$enrollment->id) }}" method="Post">
                 <!-- <a class="btn btn-primary" href="{{ route('course.edit',$enrollment->id) }}">Edit</a> -->
                 @csrf
                 @method('DELETE')
                 <button type="submit" class="btn btn-danger">></button>
               </form>
              </td>
              <?php $totalsks += $enrollment->CourseSC; $ycid++; ?>
            </tr>
            <tr>
            @endforeach
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td>Total SKS</td>
              <td>{{ $totalsks }}<td>
            <tr>
           </table>
          </div>
          <div><img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2Foriginals%2F38%2F03%2Faf%2F3803afa55f1870c4e1e721147dd6db50.png&f=1&nofb=1" width="100"/></div>
          <!-- tabel kedua-->
          <div>
           <table class="table table-bordered">
            <tr><th colspan="5">Courses</th></tr>
            <tr>
             <th>No</th>
             <th>List Courses</th>
             <th>Professor</th>
             <th>SC</th>
             <th>Action</th>
            </tr>
          
           @foreach ($courses as $course)
            <tr>
              <td>{{ $course->id }}</td>
              <td>{{ $course->CourseName }}</td>
              <td>{{ $course->LecturerName }}</td>
              <td>{{ $course->CourseSC }}</td>
              <td>
              	<form action="{{ route('course.store') }}" method="Post">
                  @csrf
                  <input type="hidden" name="StudentID" value="{{ $coba->id }}"/>
                  <input type="hidden" name="CourseID" value="{{ $course->id }}"/>
              		<button class="btn btn-success">+</button>
              	</form>
              </td>
            </tr>
           @endforeach
           </table>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
