@extends('dashboard.layouts.main')
@section('title', 'Companies')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Howdy, Admin</h1>
</div>
<a class="btn btn-success mb-3" href="{{ route('companies.create')}}">Tambah +</a>
<br>
<div class="table-responsive">
    <table id="myTable" class="table table-striped table-bordered table-sm">
        <thead>
            <tr class="table-success">
                <th>No</th>
                <th>Nama Perusahaan</th>
                <th>Email</th>
                <th>Logo Perusahaan</th>
                <th>Website</th>
                <th class="text-center">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $item)
                <tr>
                    <td class="text-center align-middle" style="width:3%;">{{$loop->iteration}}</td>
                    <td class="align-middle">{{$item->name}}</td>
                    <td class="align-middle">{{$item->email}}</td>
                    <td class="text-center" style="width:10%;"><img src="{{ asset('storage/'.$item->logo)}}" width="100"></td>
                    <td class="align-middle"><a href="{{$item->website}}">{{$item->website}}</a></td>
                    <td class="align-middle text-center" style="width:10%;">
                        <a href="{{route('companies.edit', $item->id)}}" class="btn btn-primary mr-2">Edit</a>
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
    <br>
</div>
@endsection