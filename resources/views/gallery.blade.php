@extends('layouts.master')

@section('title', 'Image Gallery')     
@section('content')
  <section>
    <div class="container">
      <div class="row">
        @for($i=1; $i<=16; $i++)
          <div class="col-md-6">
            <img data-original="http://45.33.113.129/images/img-{{ $i }}.jpg" />
          </div>
        @endfor
      </div>
    </div>
  </section>
@endsection

