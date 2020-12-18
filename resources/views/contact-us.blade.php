@extends('layouts.master')

@section('title', 'Contact Us')
@section('content')    
  <section style="padding-top: 60px;">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <div class="card">
            <div class="card-header">
              Contact Us
            </div>
            <div class="card-body">
              @if (Session::has('message_send'))
                  <div class="alert alert-success" role="alert">
                    {{ Session::get('message_send') }}
                  </div>
              @endif
              <form action="{{ route('contact.send') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control" />
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" name="email" class="form-control" />
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" name="phone" class="form-control" />
                </div>
                <div class="form-group">
                  <label for="msg">Message</label>
                  <textarea name="msg" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary float-end my-3">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection