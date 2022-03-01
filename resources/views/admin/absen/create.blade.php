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
                    <div class="card-header">Tambah Data Absensi</div>
                    <div class="card-body">
                        <form action="{{ route('absen.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="table-responsive">
                                <table class="table" id="absen">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Karyawan</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Status Absen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @foreach ($karyawan as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->nama_karyawan }} <input type="hidden" name="karyawan_id[]"
                                                        value="{{ $data->id }}"></td>
                                                <td>
                                                    {{-- <input type="date" name="tanggal_masuk" class="form-control @error('tanggal_masuk') is-invalid @enderror">
                                            @error('tanggal_masuk')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror --}}
                                                </td>
                                                @if (is_null($data->tanggal_masuk))
                                                    <td>
                                                        <input type="checkbox" id="status_absen" name="status_absen[]"
                                                            value="hadir">
                                                        <label for="status_absen"> Hadir</label><br>
                                                        <input type="checkbox" id="status_absen" name="status_absen[]"
                                                            value="izin">
                                                        <label for="status_absen"> Izin</label><br>
                                                        <input type="checkbox" id="status_absen" name="status_absen[]"
                                                            value="sakit">
                                                        <label for="status_absen"> Sakit</label><br>
                                                        <input type="checkbox" id="status_absen" name="status_absen[]"
                                                            value="alpa">
                                                        <label for="status_absen"> Alpa</label><br>
                                                    </td>
                                                @else
                                                    <td>
                                                        <input type="checkbox" id="status_absen" name="status_absen[]"
                                                            disabled value="hadir">
                                                        <label for="status_absen"> Hadir</label><br>
                                                        <input type="checkbox" id="status_absen" name="status_absen[]"
                                                            disabled value="izin">
                                                        <label for="status_absen"> Izin</label><br>
                                                        <input type="checkbox" id="status_absen" name="status_absen[]"
                                                            disabled value="sakit">
                                                        <label for="status_absen"> Sakit</label><br>
                                                        <input type="checkbox" id="status_absen" name="status_absen[]"
                                                            disabled value="alpa">
                                                        <label for="status_absen"> Alpa</label><br>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                </table>
                            </div>
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
