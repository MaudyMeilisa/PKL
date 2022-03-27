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
                <div class="card-header">Edit Data Pinjaman</div>
                <div class="card-body">
                   <form action="{{route('pinjaman.update',$pinjaman->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                                <label for="">Nama Karyawan</label>
                                <select name="karyawan_id" class="form-control @error('karyawan_id') is-invalid @enderror" >
                                @foreach($karyawan as $data)
                                    <option value="{{$data->id}}" {{$data->id == $pinjaman->karyawan_id ? 'selected="selected"' : '' }}>{{$data->nama_karyawan}}</option>
                                @endforeach
                            </select>

                            </div>
                        <div class="form-group">
                            <label for="">BPJS</label>
                            <input type="number" name="bpjs" value="{{$pinjaman->bpjs}}" class="form-control @error('bpjs') is-invalid @enderror">
                             @error('bpjs')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Investasi</label>
                            <input type="number" name="investasi" value="{{$pinjaman->investasi}}" class="form-control @error('investasi') is-invalid @enderror">
                             @error('investasi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Kasbon</label>
                            <input type="number" name="kasbon" value="{{$pinjaman->kasbon}}" class="form-control @error('kasbon') is-invalid @enderror">
                             @error('kasbon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                         <div class="form-group">
                            <label for="">Tagihan</label>
                            <input type="number" name="tagihan" value="{{$pinjaman->tagihan}}" class="form-control @error('tagihan') is-invalid @enderror">
                             @error('tagihan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Total Pinjaman</label>
                            <input type="number" name="total_pinjaman" value="{{$pinjaman->total_pinjaman}}" class="form-control @error('total_pinjaman') is-invalid @enderror">
                             @error('total_pinjaman')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="reset" class="btn btn-outline-warning">Reset</button>
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
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
