@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>
        <div class="card-body">
          You are granted as Admin.
          <!-- template -->
	  <div class="container mt-2">
	   <div class="row">
	    <div class="col-lg-12 margin-tb">
	     <div class="pull-left">
	      <h2></h2>
	     </div>
	     <div class="pull-right mb-2">
	      <a class="btn btn-success" href="{{ route('home.create') }}">> Insert a new Student User</a>
	      <a class="btn btn-success" href="{{ route('student.export') }}">> Export to csv</a>
	     </div>
	   </div>
	 </div>
	@if ($message = Session::get('success'))
	 <div class="alert alert-success">
	   <p>{{ $message }}</p>
	 </div>
	@endif
	 <table class="table table-bordered">
	  <tr>
	   <th>No</th>
	   <th>Student Name</th>
	   <th>Semester</th>
	   <th>Student Email</th>
	   <th>GPA</th>
	   <th width="200px">Action</th>
    </tr>
    <?php $noId = 1; ?>
	 @foreach ($students as $student)
	<tr>
	    <td>{{ $noId }}</td>
	    <td>{{ $student->StudentName }}</td>
 	    <td>{{ $student->StudentSemester }}</td>
	    <td>{{ $student->user_email }}</td>
		<td>{{ $student->StudentGPA }}</td>
	    <td>
       		<form action="{{ route('home.destroy',$student->id) }}" method="Post">
				<!-- <a class="btn btn-primary" href="{{ route('home.show', $student->id)}}">> Grade</a> -->
				<a class="btn btn-secondary" href="{{ route('home.edit',$student->id) }}">> Modify</a>
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">> Remove</button>
			</form>
	    </td>
    </tr>
    <?php $noId++; ?>
	 @endforeach
	 </table>
	 {!! $students->links() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
