<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\Absen;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Session;
use \Carbon\Carbon;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //
    //     $karyawan = Karyawan::get();
    //     $absen = Absen::all();
    //     return view('admin.absen.index', compact('absen'));
    // }

    public function index()
    {
        //
        // $karyawan = Karyawan::get();
        // $absen = Absen::orderBy('created_at', 'desc')->take(4)->get();
        // return view('admin.absen.index', compact('absen', 'karyawan'));
        $karyawan = Karyawan::get();
        // $absen = Absen::all();
        return view('admin.absen.index', compact('karyawan'));


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $karyawan = Karyawan::get();
    //     // $absen = Absen::all();
    //     return view('admin.absen.index', compact('karyawan'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'status_absen.*' => 'required',
        ]);
        foreach ($request->input('karyawan_id') as $key => $value) {

            $absen = new Absen;
            $absen->karyawan_id = $request->karyawan_id[$key];
            $absen->tanggal_masuk = Carbon::now();
            $absen->status_absen = $request->status_absen[$key];
            $absen->save();

        }

        // dd($request->all());
        Alert::success('Success', 'Berhasil Menambahkan Data Absensi');
        Session::flash("flash_notification", [
            "level" => "success",
            "message" => "Berhasil Menyimpan  $absen->nama_karyawan",
        ]);
        return redirect()->route('absen.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $absen = Absen::findOrFail($id);
        return view('admin.absen.show', compact('absen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $absen = Absen::findOrFail($id);
        $karyawan = Karyawan::all();

      

        return view('admin.absen.edit', compact('absen', 'karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'karyawan_id' => 'required',
            'tanggal_masuk' => 'required',
            'status_absen' => 'required',
        ]);

        $absen = Absen::findOrFail($id);
        $absen->karyawan_id = $request->karyawan_id;
        $absen->tanggal_masuk = $request->tanggal_masuk;
        $absen->status_absen = $request->status_absen;
        $absen->save();
        Alert::success('Success', 'Berhasil MengUpdate Data Absen');

        return redirect()->route('absen.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!Absen::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Success', 'Data deleted successfully');
        return redirect()->route('absen.index');
    }
}
