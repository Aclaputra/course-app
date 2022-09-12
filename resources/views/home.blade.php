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
                  @if(Auth::user()->is_admin == 1)
                    
                    <button type="button" class="btn btn-success" 
                          data-toggle="button" aria-pressed="false" 
                          autocomplete="off">
                     > Export to CSV
                    </button> 
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Student Name</th>
                          <th scope="col">Student Semester</th>
                          <th scope="col">Semester Credit</th>
                          <th scope="col">Semester Score</th>
                          <th scope="col">Current Total GPA</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>7</td>
                          <td>20</td>
                          <td>3.81</td> 
                          <td>3.57</td>
                        </tr>
                      </tbody>
                    </table>
                    
                  @elseif(Auth::user()->is_admin == 0)
                   

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
                          $totalScore = 0;
                          $ycid = 1;
                        ?>
                        @foreach ($enrollments as $enrollment)
                        <tr>
                          <td>{{ $ycid }}</td>
                          <td>{{ $enrollment->CourseName }}</td>
                          <td>{{ $enrollment->LecturerName }}</td>
                          <td>{{ $enrollment->LecturerDept }}</td>
                          <td>{{ $enrollment->CourseSC }}</td>
                          <td>{{ $enrollment->EnrollmentScore}}</td>
                          
                          <?php 
                            $totalsks += $enrollment->CourseSC; $ycid++;
                            $totalScore += $enrollment->EnrollmentScore;  
                          ?>
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

                       <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Student Name</th>
                            <th scope="col">Student Semester</th>
                            <th scope="col">Semester Credit</th>
                            <th scope="col">Semester Score</th>
                            <th scope="col">Current Total GPA</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>{{$enrollments[0]->StudentName}}</td>
                            <td>{{$enrollments[0]->StudentSemester}}</td>
                            <td>{{$totalsks}}</td>
                            <td>{{( $totalScore/$ycid)/20 }}</td> 
                            <td>{{ $enrollments[0]->StudentGPA }}</td>
                          </tr>
                        </tbody>
                      </table> 
                  @endif 
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
