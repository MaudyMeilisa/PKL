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
                                 <select class="form-control" id="exampleFormControlSelect1" name="nama_jabatan">
                                <option>Direksi</option>
                                <option>Direktur Utama</option>
                                <option>Direktur</option>
                                <option>Manager</option>
                                <option>Manager Pemasaran</option>
                                <option>Sekretaris</option>
                                <option>Administrasi</option>
                                <option>Bendahara</option>
                                <option>OB</option>
                                </select>

                                 {{-- <input type="radio" name="nama_jabatan" value="Direksi" {{ $jabatan->nama_jabatan == "Direksi" ? "checked" : "" }}>Direksi<br>
                                 <input type="radio" name="nama_jabatan" value="Direkturutama" {{ $jabatan->nama_jabatan == "Direkturutama" ? "checked" : "" }} >Direktur Utama<br>
                                <input type="radio" name="nama_jabatan" value="Direktur" {{ $jabatan->nama_jabatan == "Direktur" ? "checked" : "" }} >Direktur<br>
                                <input type="radio" name="nama_jabatan" value="Manager" {{ $jabatan->nama_jabatan == "Manager" ? "checked" : "" }}>Manager<br>
                                 <input type="radio" name="nama_jabatan" value="Managerpemasaran" {{ $jabatan->nama_jabatan == "Managerpemasaran" ? "checked" : "" }}>Manager Pemasaran<br>
                                <input type="radio" name="nama_jabatan" value="Sekretaris" {{ $jabatan->nama_jabatan == "Sekretaris" ? "checked" : "" }}>Sekretaris<br>
                                 <input type="radio" name="nama_jabatan" value="Adminis" {{ $jabatan->nama_jabatan == "Adminis" ? "checked" : "" }}>Administrasi<br>
                                <input type="radio" name="nama_jabatan" value="Bendahara" {{ $jabatan->nama_jabatan == "Bendahara" ? "checked" : "" }}>Bendahara<br>
                                <input type="radio" name="nama_jabatan" value="OB" {{ $jabatan->nama_jabatan == "OB" ? "checked" : "" }}>OB<br>
                                    </input> --}}
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
