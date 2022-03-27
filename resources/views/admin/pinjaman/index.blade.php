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
                    Data Pinjaman
                    <a href="{{route('pinjaman.create')}}" class="btn btn-sm btn-outline-primary float-right">Tambah Data Pinjaman</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="pinjaman">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>karyawan</th>
                                <th>BPJS</th>
                                <th>Investasi</th>
                                <th>Kasbon</th>
                                <th>Tagihan</th>
                                <th>Total Pinjaman</th>

                                <th>Aksi</th>
                            </tr>
                            <thead>
                            <tbody>
                            @php $no=1; @endphp
                            @foreach($pinjaman as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->karyawan->nama_karyawan}}</td>
                                <td>Rp.{{ number_format($data->bpjs) }}</td>
                                <td>Rp.{{number_format($data->investasi)}}</td>
                                <td>Rp.{{number_format($data->kasbon)}}</td>
                                <td>Rp.{{number_format($data->tagihan)}}</td>
                                <td>Rp.{{number_format($data->total_pinjaman)}}</td>

                                <td>
                                    <form action="{{route('pinjaman.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        @role('admin')
                                        <a href="{{route('pinjaman.edit',$data->id)}}" class="btn btn-outline-info">Edit</a>
                                        @endrole
                                        <a href="{{route('pinjaman.show',$data->id)}}" class="btn btn-outline-warning">Show</a>
                                           @role('admin')
                                        <button type="submit" class="btn btn-danger delete-confirm">Delete</button>
                                        @endrole
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
            $('#pinjaman').DataTable();
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
