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
                    <div class="card-header">Tambah Data Pinjaman</div>
                    <div class="card-body">
                        <form action="{{ route('pinjaman.store') }}" method="post" enctype="multipart/form-data">
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
                                <label for="">BPJS</label>
                                <input type="number" name="bpjs" class="form-control @error('bpjs') is-invalid @enderror">
                                @error('bpjs')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Investasi</label>
                                <input type="number" name="investasi" class="form-control @error('investasi') is-invalid @enderror">
                                @error('investasi')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Kasbon</label>
                                <input type="number" name="kasbon" class="form-control @error('kasbon') is-invalid @enderror">
                                @error('kasbon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Tagihan</label>
                                <input type="number" name="tagihan" class="form-control @error('tagihan') is-invalid @enderror">
                                @error('tagihan')
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
