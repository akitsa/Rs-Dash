@extends('back.layouts.template')

@section('title',"Data Kategori News")
@section('page-title',"Data Kategori News")

{{-- isi --}}
@section('content')

{{-- notif --}}
@if (session("message"))
<div class="alert alert-{{ session("type") }}" role="alert">
    {{ session("message") }}
</div>
@endif


<div class="card">
    <div class="card-header">
        <div class="card-tools">

            <a href="{{ url("kategorinews/form")  }}" class="btn btn-primary btn-md" >add new</a>
        </div>
    </div>
    <div class="card-body">
        <table id="dtTable" class="dtTable table table-bordered table-hover" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Category</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dtKat as $rsKat)
                    <tr>
                        <td>{{ $rsKat -> id  }}</td>
                        <td>{{ $rsKat ->nm_kat}} </td>
                        <td>{{$rsKat->status_kat}}</td>
                       <td>
                            <a href="{{ url("kategorinews/form/".$rsKat->id)}}"><i class="bi bi-pencil p-2" ></i></a>
                            <a href="{{ url("kategorinews/delete/".$rsKat->id)}}"><i class="bi bi-eraser p-2"></i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection