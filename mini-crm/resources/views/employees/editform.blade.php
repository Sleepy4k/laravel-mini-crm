@extends('layouts.main')

@section('title', 'Edit Employees')
@section('content')
<br>
<h2 class="text-center mt-4 mb-5">Edit Data Pegawai</h2>
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <form action="/updateemployees/{{ $data->id }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Depan</label>
                        <input type="text" class="form-control" id="namadepan" name="first_name" value="{{$data->first_name}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Belakang</label>
                        <input type="text" class="form-control" id="namabelakang" name="last_name" value="{{$data->last_name}}">
                    </div>
                    <div class="mb-3">
                        <label for="">ID Perusahaan</label>
                        <input type="number" class="form-control" id="companies_id" name="companies_id" value="{{$data->companies_id}}">
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="email" class="form-control" id="email"  name="email" value="{{$data->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="">No Telepon</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="{{$data->phone}}">
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection