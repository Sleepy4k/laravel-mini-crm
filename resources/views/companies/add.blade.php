@extends('dashboard.layouts.main')
@section('title', 'Companies')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Data Perusahaan</h1>
</div>
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <form action="/companies_add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="namaperusahaan" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Logo Perusahaan</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control" @error('logo') is-invalid @enderror type="file" id="logo" name="logo" onchange="previewImage()">
                        @error('logo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Website</label>
                        <input type="text" class="form-control" id="website" name="website">
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(){
        const img = document.querySelector('#logo');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(logo.files[0]);
        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection