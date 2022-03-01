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
                    </div>
                    {{-- <div class="card-body">
                        <div class="table-responsive">
                        <table class="table" id="absen">
                                <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Karyawan</th>
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
                                        <td>{{ $data->karyawan->nama_karyawan }}</td>
                                        <td>{{ $data->tanggal_masuk }}</td>
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
                    </div> --}}
                    <div class="card-body">
                        <form action="{{ route('absen.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="table-responsive">
                                <table class="table" id="absen">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Karyawan</th>
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
                                                {{-- <td> --}}
                                                    {{-- <input type="date" name="tanggal_masuk" class="form-control @error('tanggal_masuk') is-invalid @enderror">
                                            @error('tanggal_masuk')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror --}}
                                                {{-- </td> --}}
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
