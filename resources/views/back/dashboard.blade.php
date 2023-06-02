@extends('back.layouts.template')
@section('title',"Dashboard")

@section('content')
@if (session("text"))
        <div class="alert alert-{{ session("type") }}" role="alert">
            {{ session("text") }}
        </div>
@endif

<section id="gallery" class="gallery">
    <div class="container">

      <div class="section-title">
        <h2>Galeri</h2>
        {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
          consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit
          in iste officiis commodi quidem hic quas.</p> --}}
      </div>
    </div>
    
    <div class="container-fluid">
      <div class="row g-0">
          @foreach ($dtImg as $rsImg)
          <div class="col-lg-3 col-md-4">
              <div class="gallery-item">
                <a href="{{ ($rsImg->foto) }}" class="galelry-lightbox">
                  <img src="{{ ($rsImg->foto) }}" alt="{{($rsImg->title)}}" class="img-fluid">
                </a>
              </div>
            </div>        
          @endforeach
      

      </div>

    </div>
  </section>
@endsection