<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        table.static {
            position: relative;
            border: 1 px solid #545454;
        }

    </style>
    <center>Document</center>
</head>

<body>
    <div class="form-group">
        <p align="center"> <b>Laporan Transaksi</b></p>
        <table class="static" align="center" rules="alt" border="1px" style="width : 95%">

            <tr>
                <th>No</th>
                <th>Nama karyawan</th>
                <th>Nama Jabatan</th>
                <th>Gaji Pokok</th>
                <th>Tunjangan</th>
                <th>Lembur</th>
                <th>Potongan</th>
                <th>Total</th>

                <div class="form-group">
                       <a href="{{ route('transaksi.index') }}"
                            class="btn btn-outline btn-sm btn btn-primary float-right">Kembali</a><br>
                    {{-- <a href="{{ route('gaji.index') }}" class="btn btn-outline-warning">Kembali</a> --}}
                </div>
            </tr>
            </thead>
            <tbody>
                @php $no=1; @endphp
                @foreach ($gaji as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->gaji->karyawan->nama_karyawan }}</td>
                        <td>{{ $data->gaji->jabatan->nama_ jabatan}}</td>
                        <td>{{ $data->gaji->jabatan->gapok }}</td>
                        <td>{{ $data->tunjangan }}</td>
                        <td>{{ $data->lembur }}</td>
                        <td>{{ $data->potongan}}</td>
                        <td>{{ $data->total }}</td>

                    </tr>
                @endforeach
        </table>
    </div>
    <script type="text/javascript">
        window.print();
        $
    </script>

</body>

</html>
