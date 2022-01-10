@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

Dashboard

@stop

@section('content')
@include('layouts._flash')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tambah Data Absensi</div>
                    <div class="card-body">
                        <form action="{{ route('absen.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Karyawan</label>
                                <select name="karyawan_id" class="form-control @error('karyawan_id') is-invalid @enderror" >
                                @foreach($karyawan as $data)
                                    <option value="{{$data->id}}">{{$data->nama_karyawan}}</option>
                                @endforeach
                            </select>

                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Masuk</label>
                                <input type="date" name="tanggal_masuk" class="form-control @error('tanggal_masuk') is-invalid @enderror">
                                @error('tanggal_masuk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Status Absen</label><br>
                                <input type="radio" name="status_absen" value="hadir">Hadir<br>
                                <input type="radio" name="status_absen" value="izin">Izin<br>
                                <input type="radio" name="status_absen" value="sakit">Sakit<br>
                                <input type="radio" name="status_absen" value="cuti">Cuti<br>
                                <input type="radio" name="status_absen" value="tk">Tanpa Keterangan<br>
                                    </input>
                                @error('status_absen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="reset" class="btn btn-outline-warning">Reset</button>
                                <button type="submit" class="btn btn-outline-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop

@section('css')


@stop

@section('js')

@stop
