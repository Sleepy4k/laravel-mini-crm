@extends('dashboard.layouts.main')
@section('title', 'Employees')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Howdy, Admin</h1>
</div>
<a class="btn btn-success mb-3" href="{{ url('employees_add')}}">Tambah</a>
<div class="row">
    <div class="col-md-6">
        <form action="/employees"> 
            <div class="input-group mb-3">
                <form action="/employees" method="GET"> 
                <input type="text" class="form-control" placeholder="Search.." name="search">
                <button class="btn btn-primary" type="submit">Search</button>
              </div>
        </form> 
    </form>
    </div>
</div>
<br>
<div class="table-responsive">
    <table class="table table-striped table-sm table-bordered" border="1">
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
                    <td>{{$employees->firstItem() + $loop->index}}</td>
                    <td>{{$item->first_name}}</td>
                    <td>{{$item->last_name}}</td>
                    <td>{{$item->companies['name']??'-'}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>
                        <a href="/getemployees/{{$item->id}}" class="btn btn-primary">Edit</a>
                        <a href="/deleteemployees/{{$item->id}}" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$employees->links()}}
</div>
@endsection