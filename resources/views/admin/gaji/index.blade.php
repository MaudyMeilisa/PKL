@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

Dashboard

@endsection

@section('content')
@include('layouts._flash')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Pendaftaran
                    <a href="{{route('gaji.create')}}" class="btn btn-sm btn-outline-primary float-right">Tambah Data Gaji</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="gaji">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>karyawan</th>
                                <th>Jabatan</th>
                                <th>Gaji Pokok</th>
                                <th>Tunjangan</th>
                                <th>Lembur</th>
                                <th>Potongan</th>
                                <th>Total Gaji</th>
                                <th>Aksi</th>
                            </tr>
                            <thead>
                            <tbody>
                            @php $no=1; @endphp
                            @foreach($gaji as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->karyawan->nama_karyawan}}</td>
                                <td>{{$data->jabatan->nama_jabatan}}</td>
                                <td>Rp.{{ number_format($data->gapok) }}</td>
                                <td>Rp.{{number_format($data->tunjangan)}}</td>
                                <td>Rp.{{number_format($data->lembur)}}</td>
                                <td>Rp.{{number_format($data->potongan)}}</td>
                                <td>Rp.{{number_format($data->total)}}</td>
                                <td>
                                    <form action="{{route('gaji.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('gaji.edit',$data->id)}}" class="btn btn-outline-info">Edit</a>
                                        <a href="{{route('gaji.show',$data->id)}}" class="btn btn-outline-warning">Show</a>
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapus ini?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('DataTables/datatables.min.css')}}">
    @endsection

@section('js')
<script src="{{asset('DataTables/datatables.min.js')}}">
    </script>
    <script>
        $(document).ready(function(){
            $('#gaji').DataTable();
        });
        </script>
        @endsection
