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
                <div class="card-header">Edit Data Jabatan</div>
                <div class="card-body">
                   <form action="{{route('jabatan.update',$jabatan->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                                <label for="">Pilih Jabatan</label><br>
                                <input type="radio" name="nama_jabatan" value="Direktur">Direktur<br>
                                <input type="radio" name="nama_jabatan" value="Manager">Manager<br>
                                <input type="radio" name="nama_jabatan" value="Sekretaris">Sekretaris<br>
                                <input type="radio" name="nama_jabatan" value="Bendahara">Bendahara<br>
                                <input type="radio" name="nama_jabatan" value="OB">OB<br>
                                    </input>
                                @error('nama_jabatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <div class="form-group">
                            <label for="">Gaji Pokok</label>
                            <input type="number" name="gapok" value="{{$jabatan->gapok}}" class="form-control @error('gapok') is-invalid @enderror">
                             @error('gapok')
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
</div>
@stop

@section('css')


@stop

@section('js')

@stop
