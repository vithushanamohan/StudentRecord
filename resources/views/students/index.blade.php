@extends('layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Student Record</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('students.create') }}"> Create new students</a>
            </div>
        </div>
    </div>
   
    
    <table class="table table-bordered">
    <tr>
            <th>No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Joined Year</th>
            <th>Classroom</th>
            <th>Teacher</th>
            <th width="250px">Action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->fname }}</td>
            <td>{{ $student->lname }}</td>
            <td>{{ $student->gender }}</td>
            <td>{{ $student-> joined_year}}</td>
            <td>{{ App\Models\Classroom::find($student-> classroom)->name}}</td>
            <td>{{ App\Models\Classroom::find($student-> classroom)->teacher_name}}</td>


            
            <td>
                <form action="{{ route('students.destroy',$student->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('students.show',$student->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            </tr>
        @endforeach
    </table>
    
@endsection