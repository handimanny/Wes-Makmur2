@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-light border-light">
                <div class="card-header border-light">{{ __('Kategori/Buat') }}</div>

                <div class="card-body">
                    
                <form action="{{url('kategori')}}" method="POST" >
                    @csrf
                <div class="mb-3">
                    <label for="nama_kategori" class="form-label @error('nama_kategori') is-invalid @enderror">Tambah Kategori</label>
                    <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Input Name" autofocus>
                    @error('nama_kategori')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="descKategori" class="form-label @error('descKategori') is-invalid @enderror">Tambah Deskripsi</label>
                    <input type="text" class="form-control" name="descKategori" id="descKategori" placeholder="Input Name" >
                    @error('descKategori')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-primary">Tambah Kategori</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
