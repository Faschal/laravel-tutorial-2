@extends('layouts.master')

@section('title', 'All Students')     
@section('content')
  <section style="padding-top:60px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              All Students <a href="/add-student" class="btn btn-success">Add New</a>
            </div>
            <div class="card-body">
              @if (Session::has('student_deleted'))
                <div class="alert alert-success" role="alert">
                  {{ Session::get('student_deleted') }}
                </div>    
              @endif
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Profile Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($students as $student)
                      <tr>
                        <td>{{ $student->name }}</td>
                        <td><img src="{{ asset('images') }}/{{ $student->profile_image }}" style="max-width: 200px;" alt="no picture"/></td>
                        <td>
                          <div class="row">
                            <div class="col-md-auto">
                              <a href="/edit-student/{{ $student->id }}" class="btn btn-info">Edit</a>                                    
                            </div>
                            <div class="col-md-auto">
                            <form action="{{ route('student.delete', $student->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                          </div>
                          </div>
                        </td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

