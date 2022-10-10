@extends('layouts.main')

@section('title', 'Companies')
@section('content')

<table class="table table-striped" border="1">
    <thead>
        <tr class="table-success">
            <th>No</th>
            <th>Nama Perusahaan</th>
            <th>Email</th>
            <th>Logo Perusahaan</th>
            <th>Website</th>
            <td colspan="2">Opsi</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td><img src="{{$item->logo}}" height="60"></td>
                <td>{{$item->website}}</td>
                <td><button type="button" class="btn btn-primary">Edit</button></td>
                <td><button type="button" class="btn btn-danger">Hapus</button></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection