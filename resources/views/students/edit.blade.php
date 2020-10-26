@extends('layouts.app')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Student Record</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check input field code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
        </div>
    @endif
  
    <form action="{{ route('students.update',$student->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>FirstName:</strong>
                    <input type="text" name="fname" value="{{ $student->fname }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>LastName:</strong>
                    <input type="text" name="lname" value="{{ $student->lname }}" class="form-control" placeholder="Title">
                    </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gender:</strong>
                    <select class="form-control" name="gender">
                    <option disabled selected>Select Gender</option>
                    <option value="female" {{ $student->gender == "female" ? 'selected' : '' }}>F</option>
                    <option value="male" {{ $student->gender == "male" ? 'selected' : '' }}>M</option>
                    <select>
                    </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Joined Year:</strong>
                    <input type="text" name="joined_year" value="{{ $student->joined_year }}" class="form-control" placeholder="Title">
                    </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Classroom:</strong>
                    <select class="form-control" name="classroom">
                <option disabled selected>Select Classroom</option>
                    @foreach($classrooms as $classroom)
                         <option value="{{ $classroom->id }}"{{ $student-> classroom ==  $classroom->id? 'selected' : '' }}>{{ $classroom->name }}</option>
                    @endforeach
                    <select>
                    </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        
    </form>
@endsection