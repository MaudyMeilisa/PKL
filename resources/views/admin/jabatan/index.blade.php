@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')

Data Jabatan

@endsection
@section('css')
<link rel="stylesheet" href="{{asset('DataTables/datatables.min.css')}}">
    @endsection

@section('js')
<script src="{{asset('DataTables/datatables.min.js')}}">
    </script>
    <script>
        $(document).ready(function(){
            $('#jabatan').DataTable();
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
@section('content')
@include('layouts._flash')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Jabatan
                        <a href="{{ route('jabatan.create') }}" class="btn btn-sm btn-outline-primary"
                            style="float: right">Tambah Data Jabatan</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="jabatan">
                                <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Nama Jabatan</th>
                                    <th>Gaji Pokok</th>
                                    <th>Tunjangan</th>
                                    <th>Action</th>
                                </tr>
                        </thead>
                        <tbody>
                                @php $no=1; @endphp
                                @foreach ($jabatan as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->nama_jabatan }}</td>
                                        <td>Rp. {{ number_format($data->gapok) }}</td>
                                         <td>Rp. {{ number_format($data->tunjangan) }}</td>
                                        <td>
                                            <form action="{{ route('jabatan.destroy', $data->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <a href="{{ route('jabatan.edit', $data->id) }}"
                                                    class="btn btn-outline-info">Edit</a>
                                                <a href="{{ route('jabatan.show', $data->id) }}"
                                                    class="btn btn-outline-warning">Show</a>
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



