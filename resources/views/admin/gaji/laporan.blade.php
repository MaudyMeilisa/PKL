<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie-edge">
<title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>


<div class="card">
<div class="card-body">
<button onclick="return window.print()" class="btn btn-success">Cetak</button>

<table border="1" class="table">
<thead>
<tr>
<th scope="col">No</th>
<th scope="col">Nama Karyawan</th>
<th scope="col">Gaji</th>

</tr>
</thead>
<tbody>
@foreach ($gaji as $index => $data)

<tr>
<td>{{ $index+1 }}</td>
<td>{{ $data->karyawan->nama_karyawan }}</td>
<td>{{ $data->total }}</td>

</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</body>
</html>
