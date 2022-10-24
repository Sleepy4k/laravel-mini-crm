@extends('dashboard.layouts.main')
@section('title', 'Companies')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Howdy, Admin</h1>
</div>
<a class="btn btn-success mb-3" href="{{ route('employees.create')}}">Tambah +</a>
<br>
<div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered">
    <thead>
            <tr class="table-success">
                <th class="text-center">No</th>
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
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td><img src="{{ asset('storage/'.$item->logo)}}" height="60"></td>
                    <td><a href="{{$item->website}}">{{$item->website}}</a></td>
                    <td>
                        <a href="{{route('companies.edit', $item->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('companies.destroy', $item->id)}}" class="d-inline"
                            method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm ('Apakah anda yakin ingin menghapus data?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection