@extends('back.layouts.template')

@section('title',"Form Galeri video" )
@section('sub-title',"form galeri video")
    
@section('content')
{{-- Notif --}}
@if (session("text"))
<div class="alert alert-{{ session("type") }}" role="alert">
    {{ session("text") }}
</div>
@endif

<form action="{{ url("galeri_video/save") }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            @if(@$rsVid->video)
                                {{-- <img class="thumb-menu-big" src="{{ @$rsVid->foto }}" alt="{{ @$rsVid->title }}"> --}}
                                <video class="thumb-menu-big" src="{{@rsVid->video}}" alt="{{@rsVid->title}}"></video>
                            @else
                                <img class="thumb-menu-big" src="{{ asset('back/images/No_Image.jpg') }}" alt="{{ @$rsVid->title }}">
                            @endif
                            <input type="file" name="video" id="video"  >
                            <input type="hidden" name="old_video" value="{{ @$rsVid->video }}">
                            @error('video')
                                <div id="video" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            {{-- different div  --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="id">Kode Galeri</label>
                        <input type="hidden" name="id" value="{{ @$rsVid->id }}">
                        <input type="text" class="form-control @error('id') is-invalid @enderror" name="id_gal_vid" id="id_gal_vid" placeholder="Vid-123" value="{{ @$rsVid->id }}">
                        @error('id')
                            <div id="id" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Judul Galeri</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Judul Video" value="{{ @$rsVid->title }}">
                        @error('title')
                            <div id="title" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="desc">Deskripsi</label>
                        <textarea type="text" class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc" placeholder="Deskripsi video">{{ @$rsVid->desc }}</textarea>
                        @error('desc')
                            <div id="desc" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> 

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                            <option value="A" {{ @$rsVid->status=="A" ? "selected" : "" }}>Active</option>
                            <option value="NA" {{ @$rsVid->status=="Na" ? "selected" : "" }}>Not Active</option>
                        </select>
                        @error('status')
                            <div id="status" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="SAVE">
                    </div>

                </div>
            </div>
        </div>
    </div>

  </form>
@endsection