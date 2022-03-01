<?php

namespace App\Http\Controllers;
use App\Models\Absen;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class RekapController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::get();
        $absen = Absen::get();
        return view('admin.absen.rekap', compact('karyawan', 'absen'));
    }
}
