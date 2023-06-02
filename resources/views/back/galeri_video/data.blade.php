@extends('back.layouts.template')

@section('title',"Data Galeri video")
@section('page-title',"Data Galeri video")

@section('content')
@if (session("text"))
        <div class="alert alert-{{ session("type") }}" role="alert">
            {{ session("text") }}
        </div>
@endif

<div class="card">
    <div class="card-header">
        <div class="card-tools">

            <a href="{{ url("galeri_video/form")  }}" class="btn btn-primary btn-md" >add new</a>
        </div>
    </div>
    <div class="card-body">
        <table id="dtTable" class="dtTable table table-bordered table-hover" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>video</th>
                    <th>judul</th>
                    <th>deskripsi</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dtVid as $rsVid)
                    <tr>
                        <td>{{ $rsVid -> id  }}</td>
                        <td>
                            @if ( $rsVid -> video!="" )
                                {{-- <img class="thumb-video" src="{{ $rsVid->video }}" alt="{{ $rsVid->title }}"> --}}
                                <video style="width: 200px"; height="auto"; controls>
                                    <source src="{{$rsVid->video}}"type="video/mp4" >
                                        Your browser does not support the video tag.
                                </video>
                            @else 
                            {{-- jika tidak ada no image --}}
                            <img src="" alt="">
                            @endif
                        </td>
                        <td>{{ $rsVid ->title}} </td>
                        <td>{{ $rsVid ->desc}}</td>
                        <td>{{$rsVid->status}}</td>
                       <td>
                            <a href="{{ url("galeri_video/form/".$rsVid->id)}}"><i class="bi bi-pencil p-2" ></i></a>
                            <a href="{{ url("galeri_video/delete/".$rsVid->id)}}"><i class="bi bi-eraser p-2"></i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection