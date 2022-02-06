@extends('layouts.karyawan')

@section('content')

<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">

<div class="col-md-4">

<div class="card">
  <h5 class="card-header">Login</h5>
  <div class="card-body">
    {{-- <h5 class="card-title">Special title treatment</h5> --}}
    <form action="{{  route('loginKaryawan')  }}" method="POST">
    @csrf
     <p class="card-text">

        <input type="text" class="form-control" name="username" placeholder="Masukan Username Karyawan" >
        <input type="password" class="form-control" name="password" placeholder="Masukan Password Karyawan" >


    </p>
    <button type="submit"  class="btn btn-primary">Login</a>

    </form>

  </div>
</div>

</div>


</div>



@endsection
