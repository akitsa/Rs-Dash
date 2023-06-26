@extends('back.layouts.template')

@section('title',"Data Page")
@section('page-title',"Data Pages")

@section('content')
    

    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <a href="{{ url("pages/form")  }}" class="btn btn-primary btn-md" >add new</a>
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
                    @foreach ($dtPages as $rsPag)
                        <td> {{ $rsPag->id}} </td>
                        <td> {{ $rsPag->title}} </td>
                        <td> {{ $rsPag->content}} </td>
                        <td>
                            <a href="{{ url("pages/form/".$rsPag->id)}}"><i class="bi bi-pencil p-2" ></i></a>
                            <a href="{{ url("pages/delete/".$rsPag->id)}}"><i class="bi bi-eraser p-2"></i></a>
                        </td>
                    @endforeach
                   </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection