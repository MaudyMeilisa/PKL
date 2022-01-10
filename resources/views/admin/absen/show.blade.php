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
                <div class="card-header">Data Absen</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for=""> Nama Karyawan</label>
                        <input type="text" name="karyawan_id" value="{{$absen->karyawan->nama_karyawan}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> tanggal masuk</label>
                        <input type="date" name="tanggal_masuk" value="{{$absen->tanggal_masuk}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> status absen</label>
                        <input type="text" name="status_absen" value="{{$absen->status_absen}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{url('admin/absen')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
