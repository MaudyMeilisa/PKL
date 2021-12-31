@extends('layouts.admin')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="m-0">Data Penggajian</h1>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
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
                        <table class="table">
                            <tr>
                                <th>Nomor</th>
                                <th>ID karyawan</th>
                                <th>ID Jabatan</th>
                                <th>Gaji Pokok</th>
                                <th>Tunjangan</th>
                                <th>Lembur</th>
                                <th>Potongan</th>
                                <th>Total Gaji</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach($gaji as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->karyawan->nama_karyawan}}</td>
                                <td>{{$data->jabatan->id}}</td>
                                <td>{{$data->gapok}}</td>
                                <td>{{$data->tunjangan}}</td>
                                <td>{{$data->lembur}}</td>
                                <td>{{$data->potongan}}</td>
                                <td>{{$data->total}}</td>
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
