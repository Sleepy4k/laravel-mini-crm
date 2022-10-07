@extends('layouts.main')

@section('title', 'Employees')
@section('content')

<table class="table table-striped" border="1">
    <thead>
        <tr class="table-success">
            <th>No</th>
            <th>Nama Depan</th>
            <th>Nama Belakang</th>
            <th>Perusahaan</th>
            <th>Email</th>
            <th>Telepon</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->first_name}}</td>
                <td>{{$item->last_name}}</td>
                <td>{{$item->companies['name']}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->phone}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection