@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pengguna/Buat') }}</div>

                <div class="card-body">
                    
                <form action="{{url('pengguna')}}" method="POST" >
                    @csrf
                <div class="mb-3">
                    <label for="name" class="form-label @error('name') is-invalid @enderror">Tambah Nama</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Input Nama" >
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label @error('email') is-invalid @enderror">Tambah Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Input Email" >
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label @error('password') is-invalid @enderror">Tambah Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Input Password" >
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Tambah Role</label>
                    <select class="form-select" aria-label="Default select example" name="role">
                        <option selected>Open this select menu</option>
                        <option value="admin">Admin</option>
                        <option value="editor">Editor</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
