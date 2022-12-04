@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-light border-light">
                <div class="card-header border-light">{{ __('Kategori') }}</div>

                <div class="card-body">
                    
                    <a href="kategori/create" class="btn btn-outline-primary" >Tambah Kategori</a>
                      <table class="table text-light">
                          <thead>
                              <tr>
                              <th scope="col">#</th>
                              <th scope="col">Kategori</th>
                              <th scope="col">Deskripsi</th>
                              <th scope="col">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($data as $file)
                              <tr>
                              <th scope="row">{{$loop->iteration}}</th>
                              <td>{{$file['nama_kategori']}}</td>
                              <td>{{$file['descKategori']}}</td>
                              <td>
                              <a href="{{url('kategori/'.$file->id.'/edit')}}" class="btn btn-outline-success" >Edit</a>
                              |
                              <a href="{{url('deletekategori/'.$file->id)}}" class="btn btn-outline-danger" >Hapus</a>
                              </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
