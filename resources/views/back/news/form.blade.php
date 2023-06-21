@extends('back.layouts.template')

@section('title',"Form News" )
@section('page-title',"Form News")

@section('content')
<form action="{{ url("news/save") }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="title">Judul Berita</label>
                        <input type="hidden" name="id_news" value="{{@$rsNews->id}}">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Judul Berita" value="{{ @$rsNews->title }}">
                        @error('title')
                            <div id="title" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <p><strong>URL</strong> : <a href="{{ @$rsNews->slug ? route("single_news",["slug"=>$rsNews->slug]) : "" }}">{{ @$rsNews->slug ? route("single_news",["slug"=>@$rsNews->slug]) : "" }}</a></p>
                        <input type="hidden" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="slug" value="{{ @$rsNews->slug }}">
                        @error('slug')
                            <div id="slug" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                  

                    <div class="form-group">
                        <label for="konten"></label>
                        <textarea id="editor" type="text" class="form-control @error('konten') is-invalid @enderror" name="konten" id="konten" placeholder="Deskripsi">{{ @$rsNews->konten }}</textarea>
                        @error('konten')
                            <div id="konten" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
            
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    
                    <div class="form-group">
                        @if(@$rsNews->foto)
                            <img class="thumb-menu-big" src="{{ @$rsNews->foto }}" alt="{{ @$rsNews->title}}">
                        @else
                            <img class="thumb-menu-big" src="{{ asset('back/images/no_Image.jpg') }}" alt="{{ @$rsNews->title }}">
                        @endif
                        <input type="file" name="foto" id="foto">
                        <input type="hidden" name="old_foto" value="{{ @$rsNews->foto }}">
                        @error('foto')
                            <div id="foto" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="id_kat_news">Kategori news</label>
                        <select class="form-control @error('id_kat_news') is-invalid @enderror" name="id_kat_news" id="id_kat_news">
                            <option value=""> - Kategori Berita -</option>
                            @foreach ($dtKat as $rsKat)
                                <option value="{{ $rsKat->id }}" {{ @$rsNews->id_kat_news==$rsKat->id ? "selected" : "" }}>{{ $rsKat->nm_kat }}</option>
                            @endforeach
                        </select>
                        @error('id_kat_news')
                            <div id="id_kat_news" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                            <option value="A" {{ @$rsNews->status=="A" ? "selected" : "" }}>Active</option>
                            <option value="NA" {{ @$rsNews->status=="Na" ? "selected" : "" }}>Non Active</option> 
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