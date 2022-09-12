@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header d-flex justify-content-between">
                Grades 
              </div>
                <div class="card-body">
                  <table class="table table-bordered">
                        <tr>
                         <th colspan="6">Enrollment</th>
                        <tr>
                        <tr>
                         <th>No</th>
                         <th>Course Taken</th>
                         <th>Professor Name</th>
                         <th>Department</th>
                         <th>Semester Credit</th>
                         <th>Score</th>
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
                          <td>{{ $enrollment->sks }}</td>
                          <td>-</td>
                          
                          <?php $totalsks += $enrollment->sks; $ycid++; ?>
                        </tr>
                        <tr>
                        @endforeach
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>Total SC</td>
                          <td>{{ $totalsks }}<td>
                        <tr>
                       </table> 
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection 
