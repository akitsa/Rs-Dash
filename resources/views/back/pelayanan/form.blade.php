@extends('back.layouts.template')

@section('title',"form pelayanan" )
@section('page-title',"form pelayanan")

@section('content')
<form action="{{ url("pelayanan/save") }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label for="title">Judul Layanan</label>
                        <input type="hidden" name="id_news" value="{{@$rsPel->id}}">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Judul layanan" value="{{ @$rsPel->title }}">
                        @error('title')
                            <div id="title" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <p><strong>URL</strong> : <a href="{{ @$rsPel->slug ? route("single_layanan",["slug"=>$rsPel->slug]) : "" }}">{{ @$rsPel->slug ? route("single_layanan",["slug"=>@$rsPel->slug]) : "" }}</a></p>
                        <input type="hidden" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="slug" value="{{ @$rsPel->slug }}">
                        @error('slug')
                            <div id="slug" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="konten"></label>
                        <textarea  type="text" class="form-control @error('konten') is-invalid @enderror" name="konten" id="konten" placeholder="Deskripsi">{{ @$rsPel->konten }}</textarea>
                        @error('konten')
                            <div id="konten" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                            <option value="A" {{ @$rsPel->status=="A" ? "selected" : "" }}>Active</option>
                            <option value="NA" {{ @$rsPel->status=="Na" ? "selected" : "" }}>Non Active</option> 
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