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
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->logo}}</td>
                <td>{{$item->website}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection