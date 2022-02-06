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
                    <div class="card-header">Tambah Data Gaji</div>
                    <div class="card-body">
                        <form action="{{ route('gaji.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Karyawan</label>
                                <select name="karyawan_id" class="form-control @error('karyawan_id') is-invalid @enderror" >
                                @foreach($karyawan as $data)
                                    <option value="{{$data->id}}">{{$data->nama_karyawan}}</option>
                                @endforeach
                            </select>

                            </div>
                            <div class="form-group">
                                <label for="">Nama Jabatan</label>
                                <select name="jabatan_id" class="form-control @error('jabatan_id') is-invalid @enderror" >
                                @foreach($jabatan as $data)
                                    <option value="{{$data->id}}">{{$data->nama_jabatan}}</option>
                                @endforeach
                            </select>

                            </div>
                            <div class="form-group">
                                <label for="">Gaji Pokok</label>
                                <input type="number" name="gapok" class="form-control @error('gapok') is-invalid @enderror">
                                @error('gapok')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Tunjangan</label>
                                <input type="number" name="tunjangan" class="form-control @error('tunjangan') is-invalid @enderror">
                                @error('tunjangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">lembur</label>
                                <input type="text" name="lembur" class="form-control @error('lembur') is-invalid @enderror">
                                @error('lembur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Potongan</label>
                                <input type="number" name="potongan" class="form-control @error('potongan') is-invalid @enderror">
                                @error('potongan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="">total</label>
                                <input type="number" name="total" class="form-control @error('total') is-invalid @enderror">
                                @error('total')
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
