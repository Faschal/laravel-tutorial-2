@extends('layouts.master')

@section('title', 'Resize Image')    
@section('content')
  <section style="padding-top: 60px;">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-header">
              Resize Image
            </div>
            <div class="card-body">
              <form action="{{ route('image.resize') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="file">Choose Image</label>
                  <input type="file" name="file" class="form-control">
                </div>
                <button type="submit" class="btn btn-success my-3">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

