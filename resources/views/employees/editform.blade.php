@extends('dashboard.layouts.main')
@section('title', 'Edit Employees')
@section('content')
@include('sweetalert::alert')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Pegawai</h1>
</div>
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <form action="/employees/{{ $data->id }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Depan</label>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="namadepan" name="first_name" value="{{$data->first_name}}" autofocus>
                        @error('first_name')
                        <div class="invalid-feedbaack">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Belakang</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="namabelakang" name="last_name" value="{{$data->last_name}}">
                        @error('first_name')
                        <div class="invalid-feedbaack">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Nama Perusahaan</label>
                        <select class="form-select" id="companies_id" name="companies_id">
                            <option value="">-- Pilih Perusahaan --</option>
                            @foreach ($companies as $company)
                            @if (old('companies_id', $data->companies_id) == $company->id)
                            <option value="{{$company->id}}" selected>{{$company->id}}. {{$company->name}}</option>
                            @else
                            <option value="{{$company->id}}" >{{$company->id}}. {{$company->name}}</option>
                            @endif
                            @endforeach
                        </select>
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