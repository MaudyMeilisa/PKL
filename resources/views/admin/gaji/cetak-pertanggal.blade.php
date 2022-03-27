<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan Data Penggajian</title>
    <style>
        table tr td {
            font-size: 15px;
        }

        table tr .text {
            text-align: right;
            font-size: 15px;
        }

        table tr .text1 {
            text-align: right;
            font-size: 15px;
        }

        table tr .jumlah {
            font-size: 15px;
        }

        table tr .total {
            padding-left: 20px;
            font-size: 15px;
        }

    </style>
</head>

<body>
    <script language="JavaScript">
        var tanggallengkap = new String();
        var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
        namahari = namahari.split(" ");
        var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
        namabulan = namabulan.split(" ");
        var tgl = new Date();
        var hari = tgl.getDay();
        var tanggal = tgl.getDate();
        var bulan = tgl.getMonth();
        var tahun = tgl.getFullYear();
        tanggallengkap = namahari[hari] + ", " + tanggal + " " + namabulan[bulan] + " " + tahun;
    </script>
    <center>
        <table width="710">
            <tr>
                <td><img src="{{ asset('vendor/adminlte/dist/img/logop.jpg') }}" width="100" height="100"></td>
                <td>
                    <center>
                        <font size="6"><b>Penggajian Karyawan</b></font><br>
                        <font size="2">"Jl.Moh. Toha No. 18 Cigereleng Bandung Jawa Barat, Kec. Regol, Kota Bandung, Jawa Barat 40253"</font><br>
                        <font size="2"><i>telepon : 022-5667781 | Email :dsejahtera@sejahtera.co.id</i></font>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
        </table>
        <table width="710">
            <tr>
                <td class="text1">
                    <script language='JavaScript'>
                        document.write(tanggallengkap);
                    </script>
                </td>
            </tr>
        </table>
        <br>
        <table width="710">
            <tr>
                <td class="text2">
                    <h3>Laporan Data Gaji : </h3>
                </td>
            </tr>
        </table>
        <table border="1px" width="710">
            <tr>
                <th>Nomor</th>
                <th>karyawan</th>
                <th>Jabatan</th>
                <th>Gaji Pokok</th>
                <th>Tunjangan</th>
                <th>Potongan</th>
                <th>Total Gaji</th>
                <th>Tanggal Gajian</th>
            </tr>
            @php $no=1; @endphp
            @foreach ($cetak as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->karyawan->nama_karyawan }}</td>
                    <td>{{ $data->jabatan->nama_jabatan }}</td>
                    <td>Rp.{{ number_format($data->gapok) }}</td>
                    <td>Rp.{{ number_format($data->tunjangan) }}</td>
                    <td>Rp.{{ number_format($data->potongan) }}</td>
                    <td>Rp.{{ number_format($data->total) }}</td>
                    <td>{{ $data->tanggal_gajian }}</td>
                    </td>
                </tr>
            @endforeach
        </table>
        {{-- <table border="1" width="710" height="100">
            <tr>
                <td width="420" class="total"><b>Total Dana : </b></td>
                <td align="center" class="jumlah"><b>Rp. {{ number_format($total) }}</b></td>
            </tr>
        </table> --}}
    </center>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
