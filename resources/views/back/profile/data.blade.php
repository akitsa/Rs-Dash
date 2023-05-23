@extends('back.layouts.template')

@section('title',"data profile")
@section('page-title',"data profile")

{{-- isi --}}
@section('content')

{{-- notif --}}
@if (session("message"))
<div class="alert alert-{{ session("type") }}" role="alert">
    {{ session("text") }}
</div>
@endif


<div class="card">
    <div class="card-header">
        <div class="card-tools">

            <a href="{{ url("profile/form")  }}" class="btn btn-primary btn-md" >add new</a>
        </div>
    </div>
    <div class="card-body">
        <table id="dtTable" class="dtTable table table-bordered table-hover" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat</th>
                    <th>Telp</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dtPer as $rsPer)
                    <tr>
                        <td>{{ $rsPer -> id  }}</td>
                        <td>{{ $rsPer ->nm_perusahaan}}</td>
                        <td> {{ $rsPer->alamat }}</td>
                        <td>{{  $rsPer->telp  }}</td>
                        <td>{{$rsPer->email}}</td>
                       <td>
                            <a href="{{ url("profile/form/".$rsPer->id)}}"><i class="bi bi-pencil p-2" ></i></a>
                            <a href="{{ url("profile/delete/".$rsPer->id)}}"><i class="bi bi-eraser p-2"></i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection