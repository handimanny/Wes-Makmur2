@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark border-light" >
                <div class="card-header text-light border-light">{{ __('Halaman Postingan') }}</div>

                <div class="card-body">

                @guest
                    @if (Route::has('login'))
                        
                    @endif
                    @else
                    <form action="{{ url('home') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Kategori</label>
                        <select name="kategori_id" class="form-select" id="">
                            <option selected value="">Semua Kategori</option>
                            @foreach ($kategori as $ini)
                            <option value="{{ $ini->id }}">{{ $ini->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex">
                            <input class="form-check-input m-1" name="uid" type="checkbox" value="{{ Auth::user()->id }}">
                            <p>Tampilkan buku yang sudah saya baca</p>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-secondary mb-4">Submit</button>
                </form>
                @endguest

                <!-- pilih kategori awal -->
                <div class="dropdown mb-3">
                    <!-- <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Kategori
                    </a> -->
                    <a class="btn btn-outline-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Kategori
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/">Semua Kategori</a></li>
                        @foreach ($kategori as $ini)
                            <li><a class="dropdown-item" href="/{{ $ini->id }}">{{ $ini->nama_kategori }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- pilih kategori ahir -->
                    
                        <!-- <div class="row">
                            @foreach ($data as $file)
                            <div class="form">
                                <div class="card">
                                    <a href="{{url('halaman/'.$file->id.'/lihat')}}" class="btn btn-outline-dark" >

                                            <h5 class="card-title">Judul : {{ $file->judul }}</h5>
                                            <h5 class="card-text">Kategori : {{$file->kategori->nama_kategori}}</h5>
                                    </a>

                                    
                                </div>
                            </div>
                            @endforeach
                        </div> -->

                        <!-- <div class="row">
                            @foreach ($data as $file)
                            <div class="form">
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
                        </div> -->

                        <!-- <div class="row mt-2">
                            @foreach ($data as $file)
                            <div class="form">
                                <div class="card">
                                    <a href="{{url('halaman/'.$file->id.'/lihat')}}" class="nav-link" >
                                        <div class="card-body">

                                            <h5 class="card-title">Judul : {{ $file->judul }}</h5>
                                            <h5 class="card-text">Kategori : {{$file->kategori->nama_kategori}}</h5>

                                        </div>
                                    </a>

                                    
                                </div>
                            </div>
                            @endforeach
                        </div> -->

                        <!-- <div class="row">
                            @foreach ($data as $file)
                            <div class="col-lg-4 mt-2">
                                <div class="card">
                                    <a href="{{url('halaman/'.$file->id.'/lihat')}}" class="nav-link" >
                                        <div class="card-body">
                                            <h5 class="card-title">Judul : {{ $file->judul }}</h5>
                                            <h5 class="card-text">Kategori : {{$file->kategori->nama_kategori}}</h5>
                                        </div>
                                    </a>

                                    
                            </div>
                            @endforeach
                        </div> -->
                        
                        <!-- <div class="row">
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
                            @endforeach
                        </div> -->

                        <div class="row">
                            @foreach ($data as $file)
                            <!-- <div class="col-lg-4 col-md-2 col-sm-2 mt-2"> -->
                            <div class="col-lg-4 mt-2">
                                <div class="card">
                                    <div style="max-height:100px; overflow:hidden;" >
                                        <img src="https://cdn.pixabay.com/photo/2014/02/27/16/10/flowers-276014_960_720.jpg" class="card-img-top" alt="">
                                    </div>
                                    <div class="card-body bg-dark text-light">
                                        <h5 class="card-title">Judul : {{ $file->judul }}</h5>
                                        <h5 class="card-text">Kategori : {{$file->kategori->nama_kategori}}</h5>
                                        <a class="nav-link btn btn-outline-secondary" href="{{url('halaman/'.$file->id.'/lihat')}}">Lihat</a>
                                        <span>Pembaca : {{ DB::table('lihats')->where('postingan_id', $file->id)->count() }},</span>

                                        @guest
                                        Belum Dibaca
                                        @else
                                            @if (DB::table('lihats')->where('postingan_id', $file->id)->where('user_id', Auth::user()->id)->exists())
                                            Sudah Dibaca
                                            @else
                                            Belum Dibaca
                                            @endif
                                        @endguest
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <!-- <div class="row">
                            @foreach ($data as $file)
                            <div class="col-lg-4 col-md-2 col-sm-2 mt-2">
                            <div class="col-lg-4 mt-2">
                                <div class="card">
                                <a class="nav-link" href="{{url('halaman/'.$file->id.'/lihat')}}">
                                    <div style="max-height:100px; overflow:hidden;" >
                                        <img src="https://cdn.pixabay.com/photo/2014/02/27/16/10/flowers-276014_960_720.jpg" class="card-img-top" alt="">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Judul : {{ $file->judul }}</h5>
                                        <h5 class="card-text">Kategori : {{$file->kategori->nama_kategori}}</h5>
                                    </div>
                                </a>
                                </div>
                            </div>
                            @endforeach
                        </div> -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
