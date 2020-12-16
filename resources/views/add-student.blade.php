@extends('layouts.master')

@section('title', 'Add Student')     
@section('content')
  <section style="padding-top:60px;">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-header">
              Add New Student
            </div>
            <div class="card-body">
              @if (Session::has('student_added'))
                <div class="alert alert-success" role="alert">
                  {{ Session::get('student_added') }}
                </div>    
              @endif              
              <form action="{{ route('student.add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control"/>
                </div>
                <div class="form-group">
                  <label for="file">Choose profile image</label>
                  <input type="file" name="file" class="form-control" onchange="previewFile(this)"/>
                  <img id="previewImg" alt="profile image" style="max-width:300px;margin:20px 0;" class="img-thumbnail"/>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
              <a href="/all-students" class="btn btn-primary my-2">Back</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

