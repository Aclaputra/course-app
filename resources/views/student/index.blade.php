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
                <h2>Laravel 8 CRUD Example Tutorial</h2>
               </div>
               <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('course.create') }}"> Create enrollment</a>
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
             <th>enrollment Name</th>
             <th>enrollment Year</th>
             <th>enrollment Email</th>
             <th width="280px">Action</th>
            </tr>
            {{ dd($enrollment) }}
           @foreach ($enrollments as $enrollment)
            <tr>
              <td>{{ $enrollment->StudentID }}</td>
              <td>{{ $enrollment->enrollmentName }}</td>
              <td>{{ $enrollment->enrollmentYear }}</td>
              <td>{{ $enrollment->user_email }}</td>
              <td>
               <form action="{{ route('course.destroy',$enrollment->id) }}" method="Post">
                 <a class="btn btn-primary" href="{{ route('course.edit',$enrollment->id) }}">Edit</a>
                 @csrf
                 @method('DELETE')
                 <button type="submit" class="btn btn-danger">Delete</button>
               </form>
              </td>
            </tr>
           @endforeach
           </table>
           {!! $enrollments->links() !!}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
