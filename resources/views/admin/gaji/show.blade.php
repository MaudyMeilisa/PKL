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
                <div class="card-header">Data Gaji</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for=""> Nama Karyawan</label>
                        <input type="text" name="" value="{{$gaji->karyawan->nama_karyawan}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> Jabatan</label>
                        <input type="text" name="" value="{{$gaji->jabatan->nama_jabatan}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> Gaji Pokok</label>
                        <input type="number" name="" value="{{$gaji->jabatan->gapok}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> Tunjangan</label>
                        <input type="number" name="tunjangan" value="{{$gaji->tunjangan}}" class="form-control" readonly>
                    </div>
                    {{-- <div class="form-group">
                        <label for=""> Lembur</label>
                        <input type="number" name="lembur" value="{{$gaji->lembur}}" class="form-control" readonly>
                    </div> --}}
                    <div class="form-group">
                        <label for="">Potongan</label>
                        <input type="number" name="potongan" value="{{$gaji->potongan}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Total</label>
                        <input type="number" name="total" value="{{$gaji->total}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{url('penggajian/gaji')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
