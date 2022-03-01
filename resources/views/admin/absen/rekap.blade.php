{{-- <!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie-edge">
<title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

<h2><center>LAPORAN PENGGAJIAN KARYAWAN</center></h2>
<h3><center>PT.MAKMUR SEJAHTERA</center></h3>
<h7><center>Alamat: Jl. Bangka Raya Kel.merdeka, Kec. Sumur Bandung - Bandung Jawa Barat</center></h7>
<div class="card">
<div class="card-body">
<button onclick="return window.print()" class="btn btn-success">Cetak</button>

<table border="1" class="table">
<thead>
<tr>
<th scope="col">No</th>
<th scope="col">Nama Karyawan</th>
<th scope="col">Tanggal Masuk</th>
<th scope="col">Status Absen</th>

</tr>
</thead>
<tbody>
@foreach ($absen as $index => $data)

<tr>
<td>{{ $index+1 }}</td>
<td>{{ $data->karyawan->nama_karyawan }}</td>
<td>{{ $data->tanggal_masuk}}</td>
<td>{{ $data->status_absen}}</td>

</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</body>
</html> --}}

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
                        <a href ="rekap">
                        <button type="submit" class="btn btn-outline-warning" style="float: right">Rekap Absensi</button></a>
                        <a href="{{ route('absen.index') }}"><button type="submit" class="btn btn-sm btn-outline-primary"
                            style="float: right">Absensi</button></a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table" id="absen">
                                <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Karyawan</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Status Absen</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                        <tbody>
                                @php $no=1; @endphp
                                @foreach ($absen as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->karyawan->nama_karyawan }}</td>
                                        <td>{{date('d-m-y',strtotime($data->tanggal_masuk ))}}</td>
                                        <td>{{ $data->status_absen }}</td>

                                        <td>
                                            <form action="{{ route('absen.destroy', $data->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <a href="{{ route('absen.edit', $data->id) }}"
                                                    class="btn btn-outline-info">Edit</a>
                                                <button type="submit" class="btn btn-danger delete-confirm">Delete</button>
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
   <script src="{{asset('js/sweetalert2.js')}}"></script>
<script>
    $(".delete-confirm").click(function (event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
</script>
        @endsection
