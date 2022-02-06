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
                <div class="card-header">Edit Data Karyawan</div>
                <div class="card-body">
                   <form action="{{route('karyawan.update',$karyawan->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="">Masukan Nama Karyawan</label>
                            <input type="text" name="nama_karyawan" value="{{$karyawan->nama_karyawan}}" class="form-control @error('nama_karyawan') is-invalid @enderror">
                             @error('nama_karyawan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" name="ttl" value="{{$karyawan->ttl}}" class="form-control @error('ttl') is-invalid @enderror">
                             @error('ttl')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                                <label for="">Jenis Kelamin</label><br>
                                <input type="radio" name="jk" value="Laki-laki">Laki-laki<br>
                                <input type="radio" name="jk" value="Perempuan">Perempuan<br>
                               </input>
                                @error('jk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        <div class="form-group">
                            <label for="">Agama</label>
                            <input type="text" name="agama" value="{{$karyawan->agama}}" class="form-control @error('agama') is-invalid @enderror">
                             @error('agama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" value="{{$karyawan->alamat}}" class="form-control @error('alamat') is-invalid @enderror">
                             @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">No Handphone</label>
                            <input type="number" name="no_hp" value="{{$karyawan->no_hp}}" class="form-control @error('no_hp') is-invalid @enderror">
                             @error('no_hp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Jabatan</label>
                            <select name="jabatan_id" class="form-control @error('jabatan_id') is-invalid @enderror">
                             <option value="">Pilih Jabatan</option>
                             @foreach ($jabatan as $data)
                             <option value="{{$data->id}}">{{$data->nama_jabatan}}</option>
                             @endforeach
                            </select>
                                @error('jabatan_id')
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
