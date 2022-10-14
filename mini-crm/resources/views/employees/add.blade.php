@extends('dashboard.layouts.main')
@section('title', 'Edit Employees')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data Pegawai</h1>
</div>
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <form action="/employees_add" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Depan</label>
                        <input type="text" class="form-control" id="namadepan" name="first_name">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Belakang</label>
                        <input type="text" class="form-control" id="namabelakang" name="last_name">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Perusahaan</label>
                        <select class="form-select" id="companies_id" name="companies_id">
                            @foreach ($companies as $company)
                                <option value="{{$company->id}}">{{$company->id}}. {{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" >Email</label>
                        <input type="email" class="form-control" id="email"  name="email">
                    </div>
                    <div class="mb-3">
                        <label for="">No Telepon</label>
                        <input type="tel" class="form-control" id="phone" name="phone">
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection