@extends('back.layouts.template')

@section('title',"form pages" )
@section('page-title',"form pages")

@section('content')
<form action="{{ url("pelayanan/save") }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="title">Judul Layanan</label>
                        <input type="hidden" name="id_news" value="{{@$rsPag->id}}">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Judul layanan" value="{{ @$rsPag->title }}">
                        @error('title')
                            <div id="title" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <p><strong>URL</strong> : <a href="{{ @$rsPag->slug ? route("single_layanan",["slug"=>$rsPag->slug]) : "" }}">{{ @$rsPag->slug ? route("single_layanan",["slug"=>@$rsPag->slug]) : "" }}</a></p>
                        <input type="hidden" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="slug" value="{{ @$rsPag->slug }}">
                        @error('slug')
                            <div id="slug" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="konten"></label>
                        <textarea  type="text" class="form-control @error('konten') is-invalid @enderror" name="konten" id="konten" placeholder="Deskripsi">{{ @$rsPag->konten }}</textarea>
                        @error('konten')
                            <div id="konten" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                            <option value="A" {{ @$rsPag->status=="A" ? "selected" : "" }}>Active</option>
                            <option value="NA" {{ @$rsPag->status=="Na" ? "selected" : "" }}>Non Active</option> 
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