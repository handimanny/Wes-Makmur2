@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-light border-light">
                <div class="card-header border-light">{{ __('Rekomendasi') }}</div>

                <div class="card-body">
                    
                <form action="{{url('rekomen')}}" method="POST">
                        @csrf
                        <div class="input-group">
                            <div class="col pe-1">
                                <label>Keluhan :</label>
                                <select name="keluhan" class="form-control" >
                                    <option value="">Pilih keluhan</option>
                                    <option value="Keseleo dan kurang nafsu makan">Keseleo dan kurang nafsu makan</option>
                                    <option value="Pegal-pegal">Pegal-pegal</option>
                                    <option value="Darah tinggi dan gula darah">Darah tinggi dan gula darah</option>
                                    <option value="Kram perut dan masuk angin">Kram perut dan masuk angin</option>
                                </select>
                            </div>
                            <div class="col">
                                <label>Tahun Lahir :</label>
                                <input class="form-control" type="date" name="tahun" >
                            </div>
                        </div>
                        <div class="mt-3" >
                            <input type="submit" class="btn btn-primary" value="Lihat">
                            <a href="rekomen" class="btn btn-warning text-white">Input Ulang</a>
                        </div>
                    </form>
                    <div>
                        @isset($data)
                        <div class="card-header border-light h3">{{ __('Rekomendasi Pemakaian') }}</div>                       
                        <table class="table table-hover text-light">
                            <tr>
                                <th>Nama Jamu</th>
                                <th>:</th>
                                <td>{{$data['jamunya']}}</td>
                            </tr>
                            <tr>
                                <th>Khasiat</th>
                                <th>:</th>
                                <td>{{$data['khasiatnya']}}</td>
                            </tr>
                            <tr>
                                <th>Keluhan</th>
                                <th>:</th>
                                <td>{{$data['keluhannya']}}</td>
                            </tr>
                            <tr>
                                <th>Umur</th>
                                <th>:</th>
                                <td>{{$data['umurnya']}}</td>
                            </tr>
                            <tr>
                                <th>Penggunaan</th>
                                <th>:</th>
                                <td>{{$data['sarannya']}}</td>
                            </tr>
                        </table>
                        @endisset
                    </div>

            </div>
        </div>
    </div>
</div>
@endsection