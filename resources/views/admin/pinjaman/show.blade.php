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
                <div class="card-header">Data Pinjaman</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for=""> Nama Karyawan</label>
                        <input type="text" name="" value="{{$pinjamn->karyawan->nama_karyawan}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for=""> BPJS</label>
                        <input type="number" name="" value="{{$pinjaman->bpjs}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> Investasi</label>
                        <input type="number" name="investasi" value="{{$pinjaman>investasi}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for=""> Kasbon</label>
                        <input type="number" name="kasbon" value="{{$pinjaman->kasbon}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Tagihan</label>
                        <input type="number" name="tagihan" value="{{$pinjaman->tagihan}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Total Pinjaman</label>
                        <input type="number" name="total_pinjaman" value="{{$pinjaman->total_pinjaman}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <a href="{{url('penggajian/pinjaman')}}" class="btn btn-block btn-outline-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
