@extends('back.layouts.template')

@section('title',"form Kategori News")
@section('page-title',"form Kategori News")

{{-- isi --}}
@section('content')
<form action="{{ url('kategorinews/save')}}" method="post" enctype="multipart/form-data" >
    @csrf
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">       
                <div class="form-group">
                        @if(@$rsKat->foto)
                            <img class="thumb-menu-big" src="{{ @$rsKat->foto }}" alt="{{ @$rsKat->title }}">
                        @else
                            <img class="thumb-menu-big" src="{{ asset('back/images/No_Image.jpg') }}" alt="{{ @$rsKat->title }}">
                        @endif
                        <input type="hidden" name="id_img" value="{{ @$rsKat->id }}">
                        <input type="file" name="foto" id="foto"  >
                        <input type="hidden" name="old_foto" value="{{ @$rsKat->foto }}">
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
                        <label for="nm_kat">Kategori News</label>
                        <input type="hidden" name="id_kat" value="{{@$rsKat->id}}">
                        <input type="text" class="form-control @error('nm_kat')is-invalid @enderror"name="nm_kat"id="nm_kat" placeholder="Nama Category" value="{{ @$rsKat->nm_kat }}">
                                @error('nm_kat')
                            <div id="nm_kat" class="invalid-feedback">
                                {{ $message }}
                            </div>
                                @enderror
                    </div>
                    <div class="form-group">
                        <label for="desc">Deskripsi</label>
                        <textarea type="text" class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc" placeholder="Deskripsi news">{{ @$rsKat->desc }}</textarea>
                        @error('desc')
                            <div id="desc" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label for="status_kat">Status</label>
                        <select class="form-control @error('status_kat') is-invalid @enderror" name="status_kat" id="status_kat">
                            <option value="A" {{ @$rsKat->status_kat=="A" ? "selected" : "" }}>Active</option>
                            <option value="NA" {{ @$rsMenu->mn_stok=="NA" ? "selected" : "" }}>Not Active</option>
                        </select>
                                @error('status_kat')
                            <div id="status_kat" class="invalid-feedback">
                                {{ $message }}
                            </div>
                                    @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="SAVE" >
                    </div>
               
            </div>
        </div>
    </div>         
</div>

</form>   

@endsection