@extends('layouts.main')

@section('title', 'Edit Companies')
@section('content')
<br>
<h2 class="text-center mt-4 mb-5">Edit Data Perusahaan</h2>
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <form action="/updatecompanies/{{ $data->id }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="namaperusahaan" name="name" value="{{$data->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$data->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="">Link Logo Perusahaan</label>
                        <input type="text" class="form-control" id="linklogo"  name="logo" value="{{$data->logo}}">
                    </div>
                    <div class="mb-3">
                        <label for="">Website</label>
                        <input type="text" class="form-control" id="website" name="website" value="{{$data->website}}">
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection