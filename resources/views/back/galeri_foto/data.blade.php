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
            <div class="card-tools">

                <a href="{{ url("galeri_foto/form")  }}" class="btn btn-primary btn-md" >add new</a>
            </div>
        </div>
        <div class="card-body">
            @foreach ($dtImg as $rsImg)
            <div>
                <div class="filter-container p-0 row">
                  <div class="filtr-item col-sm-2" data-category="1" data-sort="{{$rsImg->title}}">
                    <a href="{{$rsImg->foto}}" data-toggle="lightbox" data-title="{{$rsImg->title}}">
                  
                      <img src="{{$rsImg->foto}}" class="img-fluid mb-2" alt="white sample"/>
                    </a>
                  </div>
                </div>
              </div>       
            @endforeach
        </div>
      </div>
    </div>
    
  </div>
@endsection