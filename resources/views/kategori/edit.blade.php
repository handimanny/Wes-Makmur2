@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-light border-light">
                <div class="card-header border-light">{{ __('Kategori/Edit') }}</div>

                <div class="card-body">
                    
                <form action="{{url('kategori/'.$data->id)}}" method="POST" >
                    @csrf
                    @method('PUT')
                <div class="mb-3">
                    <label for="nama_kategori" class="form-label">Edit Kategori</label>
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Input Name" value="{{$data->nama_kategori}}" autofocus >
                </div>
                <div class="mb-3">
                    <label for="descKategori" class="form-label">Edit Deskripsi</label>
                    <input type="text" class="form-control" id="descKategori" name="descKategori" placeholder="Input Name" value="{{$data->descKategori}}" autofocus >
                </div>
                <button type="submit" class="btn btn-outline-primary">Perbarui Kategori</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
