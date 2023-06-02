@extends('back.layouts.template')

@section('title',"Data Galeri")
{{-- @section('page-title',"Data Galeri") --}}

@section('content')

  {{-- notif --}}
  @if (session("text"))
        <div class="alert alert-{{ session("type") }}" role="alert">
            {{ session("text") }}
        </div>
@endif

  <div class="row">
    <div class="col-12">
      <div class="card card-primary">
        <div class="card-header">
          <h4 class="card-title">galleri foto</h4>
          <div class="card-tools">

            <a href="{{ url("galeri_foto/form")  }}" class="btn btn-primary btn-md" >add new</a>
        </div>
        </div>
       
        <div class="card-body">
          <div class="row">
            @foreach ($dtImg as $rsImg)
            <div class="col-sm-2 gal-item" >
              
              <a href="{{$rsImg->foto}}" data-toggle="lightbox" data-title="{{$rsImg->title}}" data-gallery="gallery">
                
                <img style="height: 100px; width: 100px" src="{{($rsImg->foto)}}" class="img-fluid mb-2" alt="{{$rsImg->title}}"/>
              </a>

              <div class="action">
                  <a href="{{ url("galeri_foto/form/".$rsImg->id)}}"><i class="bi bi-pencil p-2" ></i></a>
                  <a href="{{ url("galeri_foto/delete/".$rsImg->id)}}"><i class="bi bi-eraser p-2"></i></a>
              </div>

          </div>
            @endforeach
          </div>
        </div>
     
      </div>
    </div>
</div>
@endsection