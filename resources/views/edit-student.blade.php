@extends('layouts.master')

@section('title', 'Edit Student')     
@section('content')
  <section style="padding-top:60px;">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-header">
              Edit Student
            </div>
            <div class="card-body">
              @if (Session::has('student_updated'))
                <div class="alert alert-success" role="alert">
                  {{ Session::get('student_updated') }}
                </div>    
              @endif              
              <form action="{{ route('student.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $student->id }}">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" value="{{ $student->name }}" class="form-control"/>
                </div>
                <div class="form-group">
                  <label for="file">Choose profile image</label>
                  <input type="file" name="file" class="form-control" onchange="previewFile(this)"/>
                  <img id="previewImg" alt="profile image" src="{{ asset('images') }}/{{ $student->profile_image }}" style="max-width:300px;margin:20px 0;" class="img-thumbnail"/>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
              <a href="/all-students" class="btn btn-primary mt-3">Back</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

