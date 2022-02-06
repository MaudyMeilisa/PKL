@extends('adminlte::page')

@section('content_header')
    Admin Dashrboard
@endsection

@section('css')

@endsection

@section('js')

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <form action="{{ route('reportArticle') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Tanggal awal</label>
                                <input type="date" name="tanggalAwal" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Akhir</label>
                                <input type="date" name="tanggalAkhir" id="" class="form-control">
                            </div>
                            <div class="form-group">
                                <button name="submit" type="submit" class="btn btn-primay btn-block btn-lg">
                                <em class="fa fa-print">$nbsp; </em> cetak</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
