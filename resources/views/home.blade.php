@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Halaman Postingan') }}</div>

                <div class="card-body">
                    
                        <div class="row">
                            @foreach ($data as $file)
                            <div class="col-lg-4 mt-2">
                                <div class="card">
                                    <a href="{{url('halaman/'.$file->id.'/lihat')}}" class="btn btn-outline-dark" >
                                        <div class="card-body">
                                            <h5 class="card-title">Judul : {{ $file->judul }}</h5>
                                            <h5 class="card-text">Kategori : {{$file->kategori->nama_kategori}}</h5>
                                        </div>
                                    </a>
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
