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
                    <div class="card-header">Tambah Data Jabatan</div>
                    <div class="card-body">
                        <form action="{{ route('jabatan.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                            <label for="">Nama Jabatan</label><br>
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
                                
                                @error('nama_jabatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Gaji Pokok</label>
                                <input type="text" name="gapok" class="form-control @error('gapok') is-invalid @enderror">
                                @error('gapok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                @enderror
                            </div>
                             {{-- <div class="form-group">
                                <label for="">Tunjangan</label>
                                <input type="text" name="tunjangan" class="form-control @error('tunjangan') is-invalid @enderror">
                                @error('tunjangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                       @enderror
                            </div> --}}
                            <div class="form-group">
                                <button type="reset" class="btn btn-outline-warning">Reset</button>
                                <button type="submit" class="btn btn-outline-primary">Save</button>
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
