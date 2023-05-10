@extends('back.layouts.template')

@section('title',"Form News" )
@section('page-title',"Form News")

@section('content')
<form action="{{ url("news/save") }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        @if(@$rsNews->foto)
                            <img class="foto-news-big" src="{{ @$rsNews->foto }}" alt="{{ @$rsNews->title}}">
                        @else
                            <img class="foto-news-big" src="{{ asset('images/no-image.webp') }}" alt="{{ @$rsNews->title }}">
                        @endif
                        <input type="file" name="foto" id="foto">
                        <input type="hidden" name="old_foto" value="{{ @$rsNews->foto }}">
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
                        <label for="id">Kode Berita</label>
                        <input type="hidden" name="id_menu" value="{{ @$rsNews->id }}">
                        <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" id="id" placeholder="Nama Menu" value="{{ @$rsNews->id }}">
                        @error('id')
                            <div id="id" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Judul News</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Judul Berita" value="{{ @$rsNews->title }}">
                        @error('title')
                            <div id="title" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tb_kat_news_id">Kategori news</label>
                        <select class="form-control @error('tb_kat_news_id') is-invalid @enderror" name="tb_kat_news_id" id="tb_kat_news_id">
                            <option value="">- Kategori Berita -</option>
                            @foreach ($dtKat as $rsKat)
                                <option value="{{ $rsKat->id }}" {{ @$rsNews->id_kat_news==$rsKat->id ? "selected" : "" }}>{{ $rsKat->nm_kat }}</option>
                            @endforeach
                        </select>
                        @error('tb_kat_news_id')
                            <div id="tb_kat_news_id" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label for="tooltip">Tooltip</label>
                        <input type="text" class="form-control @error('tooltip') is-invalid @enderror" name="tooltip" id="tooltip" placeholder="Tooltip" value="{{ @$rsNews->tooltip }}">
                        @error('tooltip')
                            <div id="tooltip" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> 
                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" id="url" placeholder="Masukan Link Disini" value="{{ @$rsNews->url }}">
                        @error('url')
                            <div id="url" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                            <option value="A" {{ @$rsNews->status=="A" ? "selected" : "" }}>Available</option>
                            <option value="NA" {{ @$rsNews->status=="Na" ? "selected" : "" }}>Not Available</option>
                        </select>
                        @error('status')
                            <div id="status" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="desc">Deskripsi</label>
                        <textarea type="text" class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc" placeholder="Deskripsi">{{ @$rsNews->desc }}</textarea>
                        @error('desc')
                            <div id="desc" class="invalid-feedback">
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