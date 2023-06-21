@extends('front/layouts/template')

@section("title")
  <div class="title">
    <div class="container">
        <h2>News</h2> 
    </div>
  </div>
@endsection

@section('content')


  <div class="row">
    <div class="col-md-8">
      @foreach ($dtNews as $rsNews)
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <img style="width: 100%; height:auto ;" src="{{$rsNews->foto}}" class="card-img-top" alt="...">
            </div>
            <div class="col-md-8">
              <h3 class="card-text">{{ $rsNews->title  }}</h3>
              <div class="meta">{{ Carbon\Carbon::create($rsNews->created_at)->format("d F Y") }}</div>
              <p>{{ Str::limit(strip_tags($rsNews->desc),100) }}</p>
              <a  href="{{ @$rsNews->slug ? route("single_news",["slug"=>$rsNews->slug]) : "" }}">
                <button class="btn btn-primary">Lanjutkan Membaca</button>
              </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Kategori</h3>
          @foreach ($dtKat as $rsKat)
          <aside>
          <a href="">{{ $rsKat->nm_kat }}</a>  
          </aside>    
          @endforeach
        </div>
      </div>
    </div>
  </div>
 
@endsection