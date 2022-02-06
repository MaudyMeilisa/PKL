<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>

<body>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 5px;
        }

        th {
            padding: 5px;
            background: whitesmoke;
        }

    </style>

    <center><br>
        <h2>Laporan Transaksi</h2>
        <br>

        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Nama Jabatan</th>
                    <th>Gaji Pokok</th>
                    <th>Tunjangan</th>
                    <th>Lembur</th>
                    <th>Potongan</th>
                    <th>Total</th>

                </tr>
            </thead>
            <tbody>
                @php $no=1 @endphp
                <!-- data -->
                @foreach ($gaji as $data)
                    <tr>
                        <td>
                            <center>{{ $no++ }}</center>
                        </td>
                        <td>{{ $data->gaji->karyawan->nama_karyawan }}</td>
                        <td>{{ $data->gaji->jabatan->nama_jabatan }}</td>
                        <td>{{ $data->gaji->jabatan->gapok}}</td>
                        <td>{{ $data->tunjangan }}</td>
                        <td>{{ $data->lembur}}</td>
                        <td>{{ $data->potongan }}</td>
                        <td>{{ $data->total}}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </center>
</body>

</html>
