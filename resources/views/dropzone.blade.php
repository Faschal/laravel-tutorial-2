@extends('layouts.master')

@section('title', 'Dropzone FIle upload')    
@section('content')
  <section style="padding-top: 60px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              Dropzone File Upload
            </div>
            <div class="card-body">
              <form action="{{ route('image.dzone') }}" method="POST" enctype="multipart/form-data" class="dropzone dz-clickable" id="image-upload">
                @csrf
                <div>
                  <h3 class="text-center">Upload Image By Click On Box</h3>
                </div>
                <div class="dz-default dz-message">
                  <span>Drop files here to upload</span>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

