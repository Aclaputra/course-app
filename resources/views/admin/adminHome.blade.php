@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>
        <div class="card-body">
          You are Admin.
          <!-- template -->
	  <div class="container mt-2">
	   <div class="row">
	    <div class="col-lg-12 margin-tb">
	     <div class="pull-left">
	      <h2></h2>
	     </div>
	     <div class="pull-right mb-2">
	      <a class="btn btn-success" href="{{ route('home.create') }}"> Create student</a>
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
	   <th>S.No</th>
	   <th>student Name</th>
	   <th>student Year</th>
	   <th>student Email</th>
	   <th width="280px">Action</th>
	  </tr>
	 @foreach ($students as $student)
	  <tr>
	    <td>{{ $student->id }}</td>
	    <td>{{ $student->StudentName }}</td>
 	    <td>{{ $student->StudentYear }}</td>
	    <td>{{ $student->user_email }}</td>
	    <td>
	     <form action="{{ route('home.destroy',$student->id) }}" method="Post">
	       <a class="btn btn-primary" href="{{ route('home.edit',$student->id) }}">Edit</a>
	       @csrf
	       @method('DELETE')
	       <button type="submit" class="btn btn-danger">Delete</button>
	     </form>
	    </td>
	  </tr>
	 @endforeach
	 </table>
	 {!! $students->links() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
