@extends('layouts.main')

@section('title', 'Companies')
@section('content')
<br>
<h2 class="text-center mt-4 mb-5">Daftar Perusahaan</h2>
<a class="btn btn-success mb-3" href="{{ url('companies_add')}}">Tambah</a>
<br>
<table class="table table-striped" border="1">
    <thead>
        <tr class="table-success">
            <th>No</th>
            <th>Nama Perusahaan</th>
            <th>Email</th>
            <th>Logo Perusahaan</th>
            <th>Website</th>
            <th colspan="2">Opsi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td><img src="{{$item->logo}}" height="60"></td>
                <td><a href="{{$item->website}}">{{$item->website}}</a></td>
                <td><a href="/getcompanies/{{$item->id}}" class="btn btn-primary">Edit</a></td>
                <td><a href="/deletecompanies/{{$item->id}}" class="btn btn-danger">Hapus</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection