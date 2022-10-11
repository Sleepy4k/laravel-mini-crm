@extends('layouts.main')

@section('title', 'Employees')
@section('content')
<h2 class="text-center mt-4 mb-5">Daftar Pegawai</h2>
<a class="btn btn-success mb-3" href="{{ url('employees_add')}}">Tambah</a>
<br>
<table class="table table-striped" border="1">
    <thead>
        <tr class="table-success">
            <th>No</th>
            <th>Nama Depan</th>
            <th>Nama Belakang</th>
            <th>Perusahaan</th>
            <th>Email</th>
            <th>Telepon</th>
            <th colspan="2">Opsi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($employees as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->first_name}}</td>
                <td>{{$item->last_name}}</td>
                <td>{{$item->companies['name']}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->phone}}</td>
                <td><a href="/getemployees/{{$item->id}}" class="btn btn-primary">Edit</a></td>
                <td><a href="/deleteemployees/{{$item->id}}" class="btn btn-danger">Hapus</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection