@extends('dashboard.layouts.main')
@section('title', 'Employees')
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
                <th>No</th>
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>Perusahaan</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $item)
                <tr class="align-middle">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->first_name}}</td>
                    <td>{{$item->last_name}}</td>
                    <td>{{$item->companies['name']??'-- Belum memilih Perusahaan --'}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>
                        <a href="{{route('employees.edit', $item->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('employees.destroy', $item->id)}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus ?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection