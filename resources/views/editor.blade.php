@extends('layouts.master')

@section('title', 'HTML Editor')     
@section('content')
  <section style="padding-top:60px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              Tiny MCE Html Editor
            </div>
            <div class="card-body">
              <form action="" method="POST">
                @csrf
                <textarea name="mytextarea" id="mytextarea"></textarea>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

