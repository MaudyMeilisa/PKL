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
                <div class="card-header">Data Karyawan</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for=""> Nama Karyawan</label>
                        <input type="text" name="nama_karyawan" value="{{$karyawan->nama_karyawan}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> Tanggal Lahir</label>
                        <input type="date" name="ttl" value="{{$karyawan->ttl}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> Jenis Kelamin</label>
                        <input type="text" name="jk" value="{{$karyawan->jk}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> Agama</label>
                        <input type="text" name="agama" value="{{$karyawan->agama}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> Alamat</label>
                        <input type="text" name="alamat" value="{{$karyawan->alamat}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">No Handphone </label>
                        <input type="number" name="no_hp" value="{{$karyawan->no_hp}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> Jabatan</label>
                        <input type="text" name="" value="{{$karyawan->jabatan->nama_jabatan}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{url('admin/karyawan')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
