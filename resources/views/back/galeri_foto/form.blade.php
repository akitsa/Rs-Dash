@extends('back.layouts.template')

@section('title',"Form Galeri" )
@section('sub-title',"form galeri")
    
@section('content')
<form action="{{ url("galeri_foto/save") }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            @if(@$rsImg->foto)
                                <img class="thumb-menu-big" src="{{ @$rsImg->foto }}" alt="{{ @$rsImg->title }}">
                            @else
                                <img class="thumb-menu-big" src="{{ asset('back/images/No_Image.jpg') }}" alt="{{ @$rsImg->title }}">
                            @endif
                            <input type="file" name="foto" id="foto"  >
                            <input type="hidden" name="old_foto" value="{{ @$rsImg->foto }}">
                            @error('foto')
                                <div id="foto" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="id">Kode Galeri</label>
                        <input type="hidden" name="id" value="{{ @$rsImg->id }}">
                        <input type="text" class="form-control @error('id') is-invalid @enderror" name="id_gal_img" id="id_gal_img" placeholder="Img-123" value="{{ @$rsImg->id }}">
                        @error('id')
                            <div id="id" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Judul Galeri</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Judul Foto" value="{{ @$rsImg->title }}">
                        @error('title')
                            <div id="title" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="desc">Deskripsi</label>
                        <textarea type="text" class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc" placeholder="Deskripsi Foto">{{ @$rsImg->desc }}</textarea>
                        @error('desc')
                            <div id="desc" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> 

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                            <option value="A" {{ @$rsImg->status=="A" ? "selected" : "" }}>Available</option>
                            <option value="NA" {{ @$rsImg->status=="Na" ? "selected" : "" }}>Not Available</option>
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