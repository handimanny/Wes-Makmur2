@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detail Postingan') }}</div>

                <div class="card-body">
                    
                <div class="mb-3">
                    <p>
                        Judul : {{$data->judul}}
                    </p>
                </div>
                <div class="mb-3">
                    {{$data->isi}}
                </div>
                <div class="mb-3">
                    Kategori :
                    <button class="btn btn-outline-dark" disabled>{{$data->kategori->nama_kategori}}</button>
                    Tanggal dibuat :
                    <button class="btn btn-outline-dark" disabled>{{$data->tanggalDibuat}}</button>
                    Pembuat :
                    <button class="btn btn-outline-dark" disabled>{{$data->user->name}}</button>
                    Pembaca :
                    <button class="btn btn-outline-dark" disabled>{{$lihat}}</button>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Rekomendasi Produk') }}</div>

                <div class="card-body">
                    
                    <div class="row">
                        @foreach ($produk as $file)
                        <!-- <div class="col-lg-4 col-md-2 col-sm-2 mt-2"> -->
                        <div class="col-lg-4 mt-2">
                            <div class="card">
                                <div style="max-height:100px; overflow:hidden;" >
                                    <img src="{{ asset('storage/'. $file->foto) }}" class="card-img-top" alt="">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $file->namaProduk }}</h5>
                                    <h5 class="card-text">Rp {{ $file->harga }}</h5>
                                    <p class="card-text">{{ $file->descProduk }}</p>
                                    <a class="nav-link btn btn-outline-dark" href="/">Beli</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
