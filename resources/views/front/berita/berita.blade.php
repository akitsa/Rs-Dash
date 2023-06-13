@extends('front/layouts/template')

@section('content')
  <div class="col-12">
    <h1>.</h1>
  </div>
  <div class="container">
  <div class="row">
    <div class="col-5">
      konten a
    </div>
    <div class="col-5">
      konten b
    </div>
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