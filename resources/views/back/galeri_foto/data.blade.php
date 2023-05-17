@extends('back.layouts.template')

@section('title',"Data Galeri")
@section('page-title',"Data Galeri")

@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-tools">

            <a href="{{ url("galeri_foto/form")  }}" class="btn btn-primary btn-md" >add new</a>
        </div>
    </div>
    <div class="card-body">
        <table id="dtTable" class="dtTable table table-bordered table-hover" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>foto</th>
                    <th>judul</th>
                    <th>deskripsi</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dtImg as $rsImg)
                    <tr>
                        <td>{{ $rsImg -> id  }}</td>
                        <td>{{ $rsImg ->foto}}</td>
                        <td>{{ $rsImg ->title}} </td>
                        <td>{{ $rsImg ->desc}}</td>
                        <td>{{$rsImg->status}}</td>
                       <td>
                            <a href="{{ url("KategoriNews/form/".$rsImg->id)}}"><i class="bi bi-pencil p-2" ></i></a>
                            <a href="{{ url("KategoriNews/delete/".$rsImg->id)}}"><i class="bi bi-eraser p-2"></i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection