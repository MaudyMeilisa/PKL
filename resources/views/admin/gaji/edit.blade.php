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
                <div class="card-header">Edit Data Gaji</div>
                <div class="card-body">
                   <form action="{{route('gaji.update',$gaji->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                                <label for="">Nama Karyawan</label>
                                <select name="karyawan_id" class="form-control @error('karyawan_id') is-invalid @enderror" >
                                @foreach($karyawan as $data)
                                    <option value="{{$data->id}}" {{$data->id == $gaji->karyawan_id ? 'selected="selected"' : '' }}>{{$data->nama_karyawan}}</option>
                                @endforeach
                            </select>

                            </div>
                        <div class="form-group">
                            <label for="">Jabatan</label>
                            <input type="text" name="jabatan_id" value="{{$gaji->jabatan_id}}" class="form-control @error('jabatan_id') is-invalid @enderror">
                             @error('jabatan_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Gaji Pokok</label>
                            <input type="number" name="gapok" value="{{$gaji->gapok}}" class="form-control @error('gapok') is-invalid @enderror">
                             @error('gapok')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Tunjangan</label>
                            <input type="number" name="tunjangan" value="{{$gaji->tunjangan}}" class="form-control @error('tunjangan') is-invalid @enderror">
                             @error('tunjangan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan lembur</label>
                            <input type="number" name="lembur" value="{{$gaji->lembur}}" class="form-control @error('lembur') is-invalid @enderror">
                             @error('lembur')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Potongan</label>
                            <input type="number" name="potongan" value="{{$gaji->potongan}}" class="form-control @error('potongan') is-invalid @enderror">
                             @error('potongan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Total</label>
                            <input type="number" name="total" value="{{$gaji->total}}" class="form-control @error('total') is-invalid @enderror">
                             @error('total')
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
