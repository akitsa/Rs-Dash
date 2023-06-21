@extends('back.layouts.template')

@section('title',"Data Kategori News")
@section('page-title',"Data Kategori News")

@section('content')
    

    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <a href="{{ url("layanan/form")  }}" class="btn btn-primary btn-md" >add new</a>
            </div>
        </div>
        <div class="card-body">
            <table id="dtTable" class="dtTable table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>content</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                   <tr>
                    @foreach ($dtPel as $rsPel)
                        <td> {{ $rsPel->id}} </td>
                        <td> {{ $rsPel->title}} </td>
                        <td> {{ $rsPel->content}} </td>
                        <td>
                            <a href="{{ url("pelayanan/form/".$rsPel->id)}}"><i class="bi bi-pencil p-2" ></i></a>
                            <a href="{{ url("pelayanan/delete/".$rsPel->id)}}"><i class="bi bi-eraser p-2"></i></a>
                        </td>
                    @endforeach
                   </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection