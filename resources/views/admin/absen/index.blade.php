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
                        Data Absen
                        <a href="{{ route('absen.create') }}" class="btn btn-sm btn-outline-primary"
                            style="float: right">Tambah Data Absen</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table" id="absen">
                                <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Id Karyawan</th>
                                    <th> Tanggal Masuk</th>
                                    <th>Status Absen</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                        <tbody>
                                @php $no=1; @endphp
                                @foreach ($absen as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->id_karyawan }}</td>
                                        <td>{{ $data->tanggal_masuk }}</td>
                                        <td>{{ $data->status_absen }}</td>

                                        <td>
                                            <form action="{{ route('absen.destroy', $data->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <a href="{{ route('absen.edit', $data->id) }}"
                                                    class="btn btn-outline-info">Edit</a>
                                                <a href="{{ route('absen.show', $data->id) }}"
                                                    class="btn btn-outline-warning">Show</a>
                                                <button type="submit" class="btn btn-outline-danger"
                                                    onclick="return confirm('Are you sure?');">Delete</button>
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
            $('#absen').DataTable();
        });
        </script>
        @endsection
