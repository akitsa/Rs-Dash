@extends('front/layouts/template')

@section('content')
  
  <div class="">
    <h3>Artikel Kesehatan</h3>
    <div class="line"></div>
  </div>

  <div class="container">
  <div class="row">
    <div class="col-10">
      <div class="row">
        @foreach ($dtNews as $rsNews)
        <div class="card" style="width: 18rem;">
          <img style="width: 100px; height:auto ;" src="{{$rsNews->foto}}" class="card-img-top" alt="...">
          <div class="card-body">
            <p class="card-text">{{ $rsNews->title  }}</p>
            <a href="{{url('berita/{id}')}}">
              <button class="btn btn-primary">  Lanjutkan Membaca</button>
            </a>
           
          </div>
        </div>
        @endforeach
      </div>
    </div>
    {{-- <div class="col-5">
      konten b
    </div> --}}
    <div class="col-2">
      @foreach ($dtKat as $rsKat)
      <aside>
      <a href="">{{ $rsKat->nm_kat }}</a>  
      </aside>    
      @endforeach
      
    </div>
  </div>
</div>
  
 
@endsection