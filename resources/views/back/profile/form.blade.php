@extends('back.layouts.template')

@section('title',"form profile")
@section('page-title',"form profile")

{{-- isi --}}
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ url('profile/save')}}" method="post" >
                    @csrf
                    
                    <div class="form-group">
                        <label for="nm_perusahaan">Nama Perusahaan</label>
                        <input type="hidden" name="id_per" value="{{$rsPer->id}}">
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="nm_perusahaan" id="nm_perusahaan" placeholder="pt $" value="{{ @$rsPer->nm_perusahaan }}">
                        @error('nm_perusahaan')
                            <div id="nm_perusahaan" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="jl jl" value="{{ @$rsPer->alamat }}">
                        @error('alamat')
                            <div id="alamat" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="telp">telp</label>
                        <input type="number" class="form-control @error('telp') is-invalid @enderror" name="telp" id="telp" placeholder="08212" value="{{ @$rsPer->telp }}">
                        @error('telp')
                            <div id="telp" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="sadboi@github.com" value="{{ @$rsPer->email }}">
                        @error('email')
                            <div id="email" class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="SAVE" >
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection