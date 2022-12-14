@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-light border-light">
                <div class="card-header border-light">{{ __('Postingan') }}</div>

                <div class="card-body">
                    
                    <a href="postingan/create" class="btn btn-outline-primary" >Tambah Postingan</a>
                      <table class="table text-light">
                          <thead>
                              <tr>
                              <th scope="col">#</th>
                              <th scope="col">Judul</th>
                              <th scope="col">Tanggal Dibuat</th>
                              <th scope="col">Kategori</th>
                              <th scope="col">Pembuat</th>
                              <th scope="col">Status</th>
                              <th scope="col">Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($data as $file)
                              <tr>
                              <th scope="row">{{$loop->iteration}}</th>
                              <td>{{$file['judul']}}</td>
                              <td>{{$file['tanggalDibuat']}}</td>
                              <td>{{$file->kategori->nama_kategori}}</td>
                              <td>{{$file->user->name}}</td>
                              <td>{{$file['status']}}</td>
                              <td>
                              <a href="{{url('postingan/'.$file->id.'/edit')}}" class="btn btn-outline-success" >Edit</a>
                              |
                              <a href="{{url('deletepostingan/'.$file->id)}}" class="btn btn-outline-danger" >Hapus</a>
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
