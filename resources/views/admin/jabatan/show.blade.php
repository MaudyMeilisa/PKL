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
                <div class="card-header"><center><h4>Data Jabatan</h4></center>
                <center><h7><i>Tidak ada rahasia untuk sukses,sukses itu hasil dari persiapan,kerja keras dan belajar dari kegagalan</h7></i></center></div>
                <div class="card-body">
                    <div class="form-group">
                        <label for=""> Nama Jabatan</label>
                        <input type="text" name="nama_jabatan" value="{{$jabatan->nama_jabatan}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> Gaji Pokok</label>
                        <input type="number" name="gapok" value="{{$jabatan->gapok}}" class="form-control" readonly>
                    </div>
                         <div class="form-group">
                        <label for=""> tunjangan</label>
                        <input type="number" name="tunjangan" value="{{$jabatan->tunjangan}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <a href="{{url('penggajian/jabatan')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
