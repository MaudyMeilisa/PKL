<?php

namespace App\Http\Controllers;
use App\Models\Absen;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // public function absen()
    // {
    //     //
    //     $karyawan = Karyawan::get();
    //     $absen = Absen::all();
    //     return view('admin.absen.absen', compact('absen'));
    // }
}
