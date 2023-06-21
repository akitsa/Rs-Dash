@extends('front/layouts/template')

@section('content')
<div class="">
    <h3>Artikel Berita</h3>
    <div class="line"></div>
  </div>
  <div class="container">
    <div class="row">
        <div class="col12">
            <div class="row">
               <p>  {!! htmlspecialchars_decode( @$News->konten) !!}</p>
            </div>
        </div>
    </div>
  </div> 
@endsection