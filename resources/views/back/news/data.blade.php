@extends('back.layouts.template')

@section('title',"Data News" )
@section('page-title',"Data News")

@section('content')

{{-- notif --}}
@if (session("text"))
        <div class="alert alert-{{ session("type") }}" role="alert">
            {{ session("text") }}
        </div>
@endif

<div class="card">
    <div class="card-header">
        <div class="card-tools">

            <a href="{{ url("news/form")  }}" class="btn btn-primary btn-md" >add new</a>
        </div>
    </div>
    <div class="card-body">
        <table id="dtTable" class="dtTable table table-bordered table-hover" >
            <thead>
                <tr>
                    <th>photo</th>
                    <th>ID</th>
                    {{-- <th>kategori news</th> --}}
                    <th>title</th>
                    <th>tooltip</th>
                    <th>url</th>
                    <th>desc</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dtNews as $rsNews)
                    <tr>
                        <td>
                            @if ( $rsNews -> foto!="" )
                                <img class="thumb-menu" src="{{ $rsNews->foto }}" alt="{{ $rsNews->title }}">
                            @else 
                            {{-- jika tidak ada no image --}}
                            <img src="old-photo" alt="">
                            @endif
                        </td>
                        <td>{{ $rsNews->id  }}</td>
                        {{-- <td>{{ $rsNews->id_kat_news }}</td> --}}
                        <td>{{ $rsNews->title   }}</td>
                        <td>{{ $rsNews->tooltip   }}</td>
                        <td>{{ $rsNews->url  }}</td>
                        <td>{{ $rsNews ->desc }}</td>
                        <td>{{$rsNews->status}}</td>
                       <td>
                            <a href="{{ url("news/form/".$rsNews->id)}}"><i class="bi bi-pencil p-2" ></i></a>
                            <a href="{{ url("news/delete/".$rsNews->id)}}"><i class="bi bi-eraser p-2"></i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection